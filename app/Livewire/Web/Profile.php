<?php

namespace App\Livewire\Web;

use App\Models\Answer;
use App\Models\Form;
use App\Traits\PDFHelper;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Profile extends Component
{
    use WithPagination;
    use PDFHelper;

    public $user;
    public $selectedForm = '';
    public $forms;
    public $stats = [];
    public $perPage = 10;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->user = auth()->user();
        $this->forms = Form::data()->get();
        $this->loadStats();
    }

    public function updatedSelectedForm()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function loadStats()
    {
        $userId = $this->user->id;

        $this->stats = [
            'total'      => Answer::where('user_id', $userId)->count(),
            'daily'      => Answer::where('user_id', $userId)
                ->whereHas('form', fn($q) => $q->where('type', 'daily'))
                ->count(),
            'monthly'    => Answer::where('user_id', $userId)
                ->whereHas('form', fn($q) => $q->where('type', 'monthly'))
                ->count(),
            'annual'     => Answer::where('user_id', $userId)
                ->whereHas('form', fn($q) => $q->where('type', 'annual'))
                ->count(),
            'weekly'     => Answer::where('user_id', $userId)
                ->whereHas('form', fn($q) => $q->where('type', 'weekly'))
                ->count(),
            'this_month' => Answer::where('user_id', $userId)
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
        ];
    }

    /**
     * Generate and stream the filled PDF for a given answer.
     */
    public function downloadPdf(int $answerId)
    {
        $answer = Answer::where('user_id', $this->user->id)
            ->with('form')
            ->findOrFail($answerId);

        $data = $answer->solutions;
        $data['date'] = $answer->created_at->format('Y-m-d');

        // Use the user's signature if available, otherwise fall back to default
        $sigPath = $this->user->signature
            ? public_path('upload/' . $this->user->signature)
            : public_path('upload/64ebaa47be8b0.png');

        $data['signature_image'] = $sigPath;

        // fillPdf saves the result to pdf-viewer/web/pdfs/ and returns the filename
        $fileName = $this->fillPdf($data, $answer->form);

        $filePath = public_path('pdf-viewer/web/pdfs/' . $fileName);

        return response()->download($filePath, $fileName, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }

    #[Layout('layouts.web.app'), Title('قسم السلامة - ملفي الشخصي')]
    public function render()
    {
        $answers = Answer::where('user_id', $this->user->id)
            ->with(['form'])
            ->when($this->selectedForm, fn($q) => $q->where('form_id', $this->selectedForm))
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.web.profile', compact('answers'));
    }
}
