@extends('welcome')
@section('content')
    @livewire('karir-list')
@endsection
@section('keywords', 'Karir, Lowongan Kerja, Peluang Karir, Rekrutmen, Pekerjaan, Bergabung dengan Kami, Karir Fiberconnect')
@section('description', 'Temukan peluang karir terbaik di Fiberconnect. Jelajahi berbagai posisi yang tersedia dan bergabunglah dengan tim kami untuk berkembang bersama dalam industri teknologi dan komunikasi.')
@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterButton = document.getElementById('filterDropdownButton');
        const filterDropdown = document.getElementById('filterDropdown');
        const filterLabel = document.getElementById('filter-label');
        const radios = document.querySelectorAll('#filterDropdown input[type="radio"]');
        const searchInput = document.getElementById('search');
        const form = document.getElementById('filter-form');

        // Show or hide the dropdown
        filterButton.addEventListener('click', function() {
            filterDropdown.classList.toggle('hidden');
        });

        // Set up radio buttons
        radios.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.checked) {
                    const selectedCategoryName = this.nextElementSibling.textContent;
                    filterLabel.textContent = selectedCategoryName;
                    filterDropdown.classList.add('hidden');

                    localStorage.setItem('selectedCategory', this.value);
                    fetchResults();
                }
            });
        });

        // Restore selected category from localStorage
        const savedCategoryId = localStorage.getItem('selectedCategory');
        if (savedCategoryId) {
            const savedCategoryRadio = document.getElementById(`kategori-${savedCategoryId}`);
            if (savedCategoryRadio) {
                filterLabel.textContent = savedCategoryRadio.nextElementSibling.textContent;
                savedCategoryRadio.checked = true;
            }
        }

        // Handle input search change
        searchInput.addEventListener('input', function() {
            fetchResults();
        });

        function fetchResults() {
            const formData = new FormData(form);
            const queryString = new URLSearchParams(formData).toString();

            fetch(`${form.action}?${queryString}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newJobsList = doc.querySelector('#jobs-list').innerHTML;
                document.getElementById('jobs-list').innerHTML = newJobsList;
            })
            .catch(error => console.error('Error:', error));
        }
    });
</script>
@endsection
