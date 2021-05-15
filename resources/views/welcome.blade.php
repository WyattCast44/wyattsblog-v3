<x-layouts.page-without-nav>

    <div class="md:p-10">

        <section class="mb-8 prose md:mb-16 md:prose-xl prose-purple">
           
            <h2 class="pb-2 text-4xl font-bold text-gray-700 border-b-4 border-gray-500 border-dashed">Greetings!</h2>

            <div class="flex flex-col-reverse items-center justify-between md:flex-row">

                <p>
                    My name is Wyatt. I'm a full stack 🥞 web artisan 👨‍🎨. This website is my home on the information super highway. I welcome you fellow web traveler 👋.
                </p>

                <x-icon-me-wizard class="h-auto w-36 md:w-80" />

            </div>

        </section>

        <section class="mb-10 prose md:mb-20 md:prose-xl prose-purple">

            <h2 class="pb-2 text-4xl font-bold text-gray-700 border-b-4 border-gray-500 border-dashed">Recent Writings</h2>

            <ul class="list-none">

                @foreach ($posts as $post)
                    <li>
                        <a href="{{ route('posts.show', $post) }}" class="!no-underline hover:!underline">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach

            </ul>
            
        </section>

        <section class="mb-20 prose md:prose-xl prose-purple">
            
            <h2 class="pb-2 text-4xl font-bold text-gray-700 border-b-4 border-gray-500 border-dashed">Newsletter</h2>

            <p>
                I occasionally send out an email about things I'm working on. I'm never going to spam you, and you can unsubscribe any time.
            </p>
            
            <div class="flex overflow-hidden">
                
                <input type="email" name="email" id="email" placeholder="Your email address" class="rounded-l focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-purple-500 focus:ring-offset-purple-200 focus:border-gray-300">

                <button class="px-4 text-sm font-semibold bg-purple-500 rounded-r text-gray-50 hover:bg-purple-600 hover:text-white hover:shadow-inner whitespace-nowrap">
                    Heckin' sign me up!
                </button>

            </div>
            
        </section>

        {{-- <section class="mb-20 prose prose-xl prose-purple">

            <h2 class="pb-2 text-4xl font-bold text-gray-700 border-b-4 border-gray-500 border-dashed">Fun Facts</h2>

            <div>

                <pre>
<code class="language-json">{
    "name": "Wyatt Castaneda",
    "email": "wyatt.castaneda@gmail.com",
    "bio": "Learner 📚, Maker 🔨, Teacher 👨‍🏫",
    "links": {
        "github": "WyattCast44",
        "twitter": "WyattCastaned44"
    },
    "occupation": [
        "👨‍🚀 Astronaut",
        "🕸️🎨 Web Artisan"
    ]
}</code></pre>

            </div>
            
        </section> --}}

    </div>

</x-layouts.page-without-nav>