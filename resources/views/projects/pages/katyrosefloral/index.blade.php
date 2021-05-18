@extends('projects.layout')

@section('page')

    <div class="p-5 mb-6 rounded-lg md:mb-12 md:p-10">

        @include('projects.pages.katyrosefloral.content')

        @env('production')
        
            <section class="max-w-xl py-5 mx-auto mt-16 border-t-4 border-gray-400 border-dashed">

                <p class="hidden"><a class="hidden" name="comments"></a></p>

                <div>
                    <script src="https://utteranc.es/client.js"
                    repo="WyattCast44/wyattsblog-v3"
                    issue-term="pathname"
                    theme="github-light"
                    label="comment"
                    crossorigin="anonymous"
                    async></script>
                </div>

            </section>
        
        @endenv

    </div>
    
@endsection