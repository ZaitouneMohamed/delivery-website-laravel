<div class="flex items-center justify-center p-12 bg-slate-800" id="div">
    <div class="mx-auto w-full max-w-[550px]">
        <h1 class="mb-3 block text-base font-bold text-2xl text-center text-white">contact us</h1>
        <form action="{{ route('send_message') }}" method="POST">
            @csrf
            @method('post')
            @if (!auth()->check())
                <div class="mb-5">
                    <label for="name" class="mb-3 block text-base font-medium text-stone-400">
                        Full Name
                    </label>
                    <input type="text" name="name" id="name" placeholder="Full Name"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-3 block text-base font-medium text-stone-400">Email Address</label>
                    <input type="email" name="email" id="email" placeholder="example@domain.com"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
                <div class="mb-5">
                    <label for="subject" class="mb-3 block text-base font-medium text-stone-400">
                        Subject
                    </label>
                    <input type="number" name="phone" id="subject" placeholder="Enter your subject"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                </div>
            @endif
            <div class="mb-5">
                <label for="message" class="mb-3 block text-base font-medium text-stone-400">
                    Message
                </label>
                <textarea rows="4" name="content" id="message" placeholder="Type your message"
                    class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
            </div>
            <div>
                <button
                    class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
