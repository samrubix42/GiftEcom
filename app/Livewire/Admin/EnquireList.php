<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Enquiry;
use Livewire\Attributes\Layout;

class EnquireList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $search = '';
    public bool $showDeleteModal = false;
    public ?int $deleteId = null;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updateStatus($id, $status)
    {
        Enquiry::where('id', $id)->update(['status' => $status]);

        $this->dispatch('toast', type: 'success', message: 'Status updated successfully.');
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function closeDeleteModal()
    {
        $this->showDeleteModal = false;
        $this->deleteId = null;
    }

    public function deleteConfirmed()
    {
        Enquiry::findOrFail($this->deleteId)->delete();

        $this->closeDeleteModal();

        $this->dispatch('toast', type: 'success', message: 'Enquiry deleted successfully.');
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $enquiries = Enquiry::where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%")
                  ->orWhere('phone', 'like', "%{$this->search}%");
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.enquire-list', compact('enquiries'));
    }
}
