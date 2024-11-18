<?php

namespace App\Livewire;

use App\Models\Karir;
use App\Models\KategoriKarir;
use Livewire\Component;
use Livewire\WithPagination;

class KarirList extends Component
{
    use WithPagination;

    public $kategoriId;
    public $searchTerm;
    public $selectedCategoryId;

    protected $queryString = [
        'kategoriId' => ['except' => ''],
        'searchTerm' => ['except' => ''],
        'selectedCategoryId' => ['except' => ''],
    ];

    public function mount()
    {
        $this->kategoriId = request()->query('kategori');
        $this->searchTerm = request()->query('search');
        $this->selectedCategoryId = request()->input('kategori');
    }

    public function render()
    {
        $karir = Karir::with(['kategori', 'perusahaan'])
            ->whereNotNull('closing_date')
            ->where('closing_date', '>', now())
            ->when($this->kategoriId, function ($query) {
                $query->where('kategori_id', $this->kategoriId);
            })
            ->when($this->searchTerm, function ($query) {
                $query->where(function($q) {
                    $q->where('title', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('requirements', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('location', 'like', '%' . $this->searchTerm . '%');
                });
            })
            ->paginate(6);

        $kategoriList = KategoriKarir::all();
        $selectedCategory = $kategoriList->find($this->selectedCategoryId);

        return view('livewire.karir-list', [
            'karir' => $karir,
            'kategoriList' => $kategoriList,
            'selectedCategory' => $selectedCategory,
            'totalEntries' => Karir::count()
        ]);
    }
}
