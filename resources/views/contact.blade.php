<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white text-center">📬 Contact</h2>
    </x-slot>

    <section class="py-12 px-4 sm:px-6 lg:px-8 text-white max-w-3xl mx-auto">
        <h3 class="text-xl font-semibold mb-4">Une question ? Une collaboration
            ? Écrivez-moi !</h3>

        <form action="#" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block mb-1 font-medium">Nom</label>
                <input type="text" id="name" name="name" required
                    class="w-full rounded bg-gray-800 border border-gray-600 p-2 text-white" />
            </div>

            <div>
                <label for="email" class="block mb-1 font-medium">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full rounded bg-gray-800 border border-gray-600 p-2 text-white" />
            </div>

            <div>
                <label for="message"
                    class="block mb-1 font-medium">Message</label>
                <textarea id="message" name="message" rows="5" required
                    class="w-full rounded bg-gray-800 border border-gray-600 p-2 text-white"></textarea>
            </div>

            <button type="submit"
                class="bg-purple-700 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded">
                Envoyer
            </button>
        </form>
    </section>
</x-app-layout>