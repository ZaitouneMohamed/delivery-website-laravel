<!-- component -->
<div class="flex items-center justify-center p-12 bg-gray-700">
    <!-- Author: FormBold Team -->
    <!-- Learn More: https://formbold.com -->
    <div class="mx-auto w-full max-w-[550px]">
        <form action="{{route('my_profile.update',$profile->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-5">
                <label
                    for="name"
                    class="mb-3 block text-base font-medium text-white">
                    Full Name
                </label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{$profile->name}}"
                    placeholder="Full Name"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
            </div>
            <div class="mb-5">
                <label
                    for="email"
                    class="mb-3 block text-base font-medium text-white""
                >
                Email Address
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{$profile->email}}"
                    id="email"
                    placeholder="example@domain.com"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
            </div>
            <div class="mb-5">
                <label
                    for="subject"
                    class="mb-3 block text-base font-medium text-white""
                >
                phone
                </label>
                <input
                    type="text"
                    name="phone"
                    value="{{$profile->phone}}"
                    id="subject"
                    placeholder="Enter your subject"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
            </div>
            <div class="mb-5">
                <label
                    for="message"
                    class="mb-3 block text-base font-medium text-white""
                >
                Adresse
                </label>
                <textarea
                    rows="4"
                    name="adresse"
                    id="message"
                    placeholder="Type your message"
                    class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                >{{$profile->adresse}}</textarea>
            </div>
            <div class="mb-5">
                <label
                    for="subject"
                    class="mb-3 block text-base font-medium text-white""
                >
                password
                </label>
                <input
                    type="password"
                    name="password"
                    id="subject"
                    placeholder="Enter your password"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                />
            </div>
            <div>
                <button type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                Submit
                </button>
            </div>
        </form>
    </div>
</div>