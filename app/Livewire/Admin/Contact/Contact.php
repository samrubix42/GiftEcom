<?php
namespace App\Livewire\Admin\Contact;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contact as ContactModel;
use Livewire\Attributes\Layout;

class Contact extends Component
{
      use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $deleteId = null;
    public $showDeleteModal = false;

    protected $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
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

    public function deleteContact()
    {
        ContactModel::findOrFail($this->deleteId)->delete();
        $this->dispatch('toast', type: 'success', message: 'Contact deleted successfully.');
        $this->closeDeleteModal();
    }

    public function markAsRead($id)
    {
        ContactModel::where('id', $id)->update(['is_read' => true]);
                $this->dispatch('toast', type: 'success', message: 'Contact marked as read successfully.');

    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $contacts = ContactModel::where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('phone', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.contact.contact', [
            'contacts' => $contacts
        ]);
    }
}
