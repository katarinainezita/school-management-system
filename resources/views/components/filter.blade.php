<div>


    <x-dropdown>
        <x-slot name="trigger">
            <x-button class="bg-red-500">
                <x-fas-filter class="w-6 h-6" />
            </x-button>
        </x-slot>

        <div class="bg-white rounded-lg shadow p-4 border-2">

            <form id="filterForm" action="{{ route($route) }}" onchange="submitForm()">
                <x-label-form for="categorySelect">Category</x-label-form>
                <x-select-input-form name="category" id="categorySelect">
                    <option value="" default selected>All</option>
                    <option value="Front End">Front End</option>
                    <option value="Backend">Backend</option>
                    <option value="IoT">IoT</option>
                    <option value="Android">Android</option>
                    <option value="IOS">IOS</option>
                    <option value="Cybersecurity">Cybersecurity</option>
                    <option value="Machine Learning">Machine Learning</option>
                </x-select-input-form>

                <x-label-form for="level" textSize="text-md" fontWeight="font-medium">Level</x-label-form>
                <x-select-input-form id='level' name="level">
                    <option value="" selected>All</option>
                    <option value="Basic">Basic</option>
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Advanced">Advanced</option>
                </x-select-input-form>
            </form>

            <a href="{{ route($route) }}" class="mt-4 text-red-500 font-semibold">Reset Filter</a>
        </div>



    </x-dropdown>
</div>

<script>
    function submitForm(e) {
        document.getElementById('filterForm').submit();

    }

    document.addEventListener('DOMContentLoaded', function() {
        var urlParams = new URLSearchParams(window.location.search);
        var categoryParam = urlParams.get('category');
        var levelParam = urlParams.get('level');

        if (levelParam) {
            var levelSelect = document.getElementById('level');
            var levelOption = levelSelect.querySelector('option[value="' + levelParam + '"]');

            if (levelOption) {
                levelOption.selected = true;
            }

        }

        if (categoryParam) {
            var categorySelect = document.getElementById('categorySelect');
            var categoryOption = categorySelect.querySelector('option[value="' + categoryParam + '"]');

            if (categoryOption) {
                categoryOption.selected = true;
            }
        }
    });
</script>
