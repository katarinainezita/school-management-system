<x-dashboard-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div x-data="{ open: true }" class="flex flex-row h-full">
        @include('admin.partials.sidebar')

        <div class="basis-4/5 grow w-full overflow-y-auto">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, minus, mollitia reiciendis temporibus amet culpa eaque iste ea, iure libero cupiditate? Officia itaque pariatur, fugiat et aut necessitatibus iusto recusandae? Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure deleniti soluta, maiores, minus cum molestiae quos magnam, voluptas nostrum eius distinctio accusamus ullam illo? Est sint officia voluptatum repudiandae error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique mollitia, culpa consectetur blanditiis eveniet recusandae ut impedit, cumque voluptas et quasi esse ducimus amet, eius optio qui totam magni pariatur aliquam quibusdam nihil. Iusto quae adipisci voluptates. Officiis odio et quae labore! Amet aut quam optio esse ad porro nostrum, explicabo ipsa debitis quos ea, dolorum suscipit sed labore. Et fuga quaerat unde ullam nesciunt voluptate repudiandae dignissimos eveniet, vitae magni? Qui voluptate unde consectetur inventore maxime voluptatem, debitis dolore dolores atque error, vel aut repellendus dicta quam necessitatibus porro aspernatur iure. Maiores a, fugit pariatur voluptates sint ullam similique aperiam cumque, expedita est impedit praesentium dolor facilis perspiciatis numquam odio libero reprehenderit laboriosam mollitia dolorem iure, quas ex! Enim, placeat! Ipsum repudiandae temporibus molestias dolorem, facilis iste expedita ducimus, eligendi officiis magnam nisi, esse debitis! Incidunt doloribus eum odit consequatur sequi optio laborum porro, natus officiis mollitia aliquid saepe ipsam iusto placeat dolorum iste quidem distinctio. Quisquam temporibus tempore nam recusandae quaerat officiis eveniet repellendus provident, numquam omnis necessitatibus dolore mollitia natus. Possimus quas odit ipsa. Et sapiente neque, harum facere rem soluta nisi odit rerum, modi dolorem quo dolor provident eum ad magni. Totam, fugit dignissimos. Facere, ducimus? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Incidunt sint provident laudantium at illum rem ullam nihil eum ex, nesciunt velit magnam eligendi quia obcaecati possimus facilis aperiam alias voluptatum fugiat iure molestias id omnis necessitatibus. Aperiam magni velit, vitae optio nesciunt consequuntur molestiae maxime laboriosam voluptate culpa minus sapiente suscipit. Porro fugiat velit ullam maxime delectus hic possimus iure tempore sequi libero non beatae aliquam ab aliquid officia vel dolorem deleniti, minima nam inventore perspiciatis. Eius facere obcaecati suscipit doloremque consequatur qui nisi ipsa doloribus beatae magnam nostrum illo praesentium, esse quos laudantium veritatis quam molestias. Libero atque, alias maiores temporibus aperiam sunt rem minus provident nobis nemo perspiciatis eius nesciunt quis natus nostrum ad incidunt. Repellendus asperiores cum doloremque ea sit. Expedita eveniet, distinctio laboriosam a fuga aliquid, temporibus rem, totam cupiditate illum cum nihil recusandae delectus ad architecto suscipit rerum non similique sed dolorem libero nulla quae quidem! At ea suscipit atque magnam qui, unde distinctio, consequatur expedita voluptatem cupiditate velit eveniet iste mollitia perspiciatis quis hic magni a quaerat ad incidunt. Inventore nesciunt ratione non dolore alias beatae repellendus veniam explicabo cupiditate voluptatibus! Sunt harum non explicabo aliquam unde nesciunt esse dicta facilis, hic amet quo.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
