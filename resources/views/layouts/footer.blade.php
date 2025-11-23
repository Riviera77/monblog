<footer class="bg-purple-900 text-white mt-12">
    <div class="max-w-7xl mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div
            class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <p class="text-sm">&copy; {{ date('Y') }} CodingQueen40. Tous droits
                réservés.</p>
            <div class="flex space-x-4">
                <a href="{{ route('articles.index') }}"
                    class="hover:underline">Blog</a>
                <a href="{{ route('contact') }}"
                    class="hover:underline">Contact</a>
            </div>
        </div>
    </div>
</footer>