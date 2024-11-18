<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Component;
use Livewire\WithPagination;

class NewsList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.news-list', [
            'news' => Berita::orderBy('created_at', 'desc')->paginate(8),
            'totalEntries' => Berita::count()
        ]);
    }
}
