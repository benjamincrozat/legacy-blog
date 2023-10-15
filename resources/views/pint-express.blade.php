<x-app
    title="Format and beautify your PHP code on the web"
    description="Pint Express lets you leverage Laravel Pint on the web to quickly format and beautify any PHP code snippet using the Laravel, PER, PSR-12, or Symfony coding style presets."
    image="{{ Vite::asset('resources/img/og-image-pint-express.jpg') }}"
    :hide-navigation="true"
    class="pb-8"
>
    <div class="container lg:max-w-screen-md">
        <x-breadcrumb class="mt-8 mb-7 md:mb-14">
            Format and beautify your PHP code on the web
        </x-breadcrumb>

        <img src="{{ Vite::asset('resources/img/pint-express.jpg') }}" width="256" height="256" alt="Pint Express" class="object-cover w-auto h-20 mx-auto rounded-lg md:rounded-xl lg:rounded-3xl sm:h-24 md:h-28" />

        <div class="mt-4 font-bold text-center text-2xl/tight sm:text-3xl/tight md:text-4xl/tight">Pint Express</div>

        <h1 class="text-center text-gray-500 sm:text-lg/tight md:text-xl/tight lg:text-2xl/tight">Format and beautify your PHP code online</h1>
    </div>

    <x-section class="container mt-8 md:mt-16 lg:max-w-screen-md">
        <livewire:pint-express />
    </x-section>

    <section class="container mt-16 lg:max-w-screen-md">
        <x-prose>
            <h2>Meet Pint Express: a simple and solid PHP beautifier.</h2>

            <p>Pint Express serves as a convenient PHP beautifier, specifically designed to make your life easier when dealing with PHP code. Whether you're a seasoned developer or someone new to the game, handling messy or inconsistent code can be a headache. That's where Pint Express comes in, offering a smooth experience to bring your code up to a more readable and maintainable standard.</p>

            <p>Based on <a href="https://laravel.com/docs/pint" rel="nofollow noopener">Laravel Pint</a>, Pint Express brings the power of a PHP code beautifier to a broader audience. Unlike the terminal-based Laravel Pint, Pint Express operates directly on the web. This means you can beautify snippets of code you come across online with just a few clicks, without having to go through your local development environment.</p>

            <p>Think of Pint Express as your go-to tool for quick fixes. Stumbled upon an interesting but horribly formatted PHP code snippet on a forum? Pint Express can clean it up for you. This way, you won't hesitate to incorporate new, useful snippets into your codebase just because they initially look like a jumbled mess.</p>

            <h2>What is Laravel Pint?</h2>

            <p><a href="https://laravel.com/docs/pint" rel="nofollow noopener">Laravel Pint</a> is an opinionated PHP code style fixer engineered for minimalists who appreciate clean and consistent code. Built on the well-established <a href="https://github.com/PHP-CS-Fixer/PHP-CS-Fixer" rel="nofollow noopener">PHP-CS-Fixer</a>, it offers a seamless way to enforce a uniform coding style across your Laravel or PHP project. If you've been yearning for a tool that just "gets" how Laravel code should look and feel, Laravel Pint is your answer.</p>

            <p>The beauty of Laravel Pint lies in its simplicity. Installation is typically a non-issue, especially if you're using recent releases of the Laravel framework, where Pint comes pre-installed. You can start using it right away without any configuration hassles, and yet it still offers the flexibility for customization if you need it.</p>

            <p>Running Laravel Pint is as straightforward as invoking the pint binary in your project's <em>vendor/bin</em> directory. You can run it on your entire project or target specific files or directories. Either way, it provides a comprehensive list of files it updates, and if you're curious about the nitty-gritty, you can use the <code>-v</code> option for an even more detailed report.</p>

            <p>For those who prefer to keep their hands on the wheel, Laravel Pint supports various configuration options through a <em>pint.json</em> file. Want to focus on only the Git-dirty files? Use the <code>--dirty</code> option. Prefer to just identify the style errors without changing any files? There's a <code>--test</code> option for that.</p>

            <p>Laravel Pint doesn't just offer a "one-size-fits-all" approach; it provides presets like Laravel, PER, PSR-12, and Symfony, along with the ability to enable or disable specific rules, making it adaptable to your project's specific requirements. And if you want to exclude files or folders, you have multiple options like <code>exclude</code>, <code>notName</code>, and <code>notPath</code> in your <em>pint.json</em> configuration.</p>

            <h2>The importance of beautifying your PHP code</h2>

            <p>Beautifying your PHP code is not just an aesthetic pursuit; it's an essential practice that has a direct impact on the readability, maintainability, and scalability of your projects. Here's why it matters:</p>

            <ol>
                <li><strong>Readability</strong>: Well-formatted code is easier to read and understand. When your code follows a consistent style, you spend less time trying to decipher what's going on, allowing you to focus on logic and functionality.</li>
                <li><strong>Team collaboration</strong>: If multiple developers are working on a project, having a consistent coding style eliminates confusion and promotes better collaboration. Nobody wants to wade through a mess of tabs, spaces, and random indentation just to understand a colleague's code.</li>
                <li><strong>Error reduction</strong>: Well-organized code minimizes the chance of errors slipping through. When code is clean and orderly, it's easier to spot anomalies such as missing semicolons, mismatched brackets, or logical inconsistencies.</li>
                <li><strong>Efficiency</strong>: Having a standardized code base speeds up the development process. You're less likely to run into issues that take time to debug, enabling you to allocate time to more critical aspects of development, like feature enhancements and optimizations.</li>
                <li><strong>Long-term maintenance</strong>: Projects evolve and may change hands over time. Future-proof your code by making it as readable and standard-conforming as possible. This makes it easier for future developers to pick up where you left off.</li>
                <li><strong>Professionalism</strong>: Finally, clean code speaks well of you as a developer. It shows that you care about your work and take the time to produce something that not only works but is also well-crafted.</li>
            </ol>

            <p>In summary, taking the time to beautify your PHP code is an investment that pays off in multiple ways, affecting not just you but also your team, your clients, and anyone else who interacts with your code. It's not a luxury; it's a necessity.</p>
        </x-prose>
    </section>
</x-app>
