<?php

namespace App\Livewire;

use App\Models\Faq;
use App\Models\KategoriFaq;
use Livewire\Component;
use Livewire\WithPagination;

class FaqList extends Component
{
    use WithPagination;

    public $categoryId = null;
    public $kategori_faqs;

    public function mount()
    {
        $this->kategori_faqs = KategoriFaq::all();
    }

    public function selectCategory($categoryId)
    {
        $this->categoryId = $categoryId;
        $this->resetPage();
    }

    public function getTotalEntries()
    {
        $query = Faq::where('status', 'Aktif');
        if ($this->categoryId) {
            $query->where('kategori_id', $this->categoryId);
        }

        return $query->count();
    }
    public function updateFaqs()
    {
        $query = Faq::where('status', 'Aktif');
        if ($this->categoryId) {
            $query->where('kategori_id', $this->categoryId);
        }
        return $query->paginate(4);
    }

    public function render()
    {
        $faqs = $this->updateFaqs(); // Mendapatkan data yang sudah dipaginasi
        $totalEntries = $this->getTotalEntries();
        return view('livewire.faq-list', compact('faqs', 'totalEntries'));
    }
}
