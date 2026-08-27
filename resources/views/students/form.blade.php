<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration | LSPU CCS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        :root { --ink: #263746; --blue: #2563eb; --sky: #eff6ff; --accent: #93c5fd; --line: #d1d5db; }
        body { background: #f5f8fa; color: var(--ink); }
        .field { border: 1px solid var(--line); background: #fbfdfe; transition: border-color 150ms ease, box-shadow 150ms ease, background 150ms ease; }
        .field:focus { border-color: var(--blue); background: #fff; box-shadow: 0 0 0 3px rgba(23, 105, 170, 0.14); outline: none; }
        .section-number { background: var(--accent); color: var(--ink); }
    </style>
</head>
<body class="min-h-screen">
    <header class="bg-[#263746] text-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-6 px-5 py-5 lg:px-8">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full border-2 border-[#93c5fd] text-sm font-bold">LSPU</div>
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#93c5fd]">Laguna State Polytechnic University</p>
                    <p class="mt-1 text-sm text-slate-300">College of Computer Studies</p>
                </div>
            </div>
            <div class="hidden border-l border-slate-600 pl-5 text-right text-xs text-slate-300 sm:block">
                <p class="font-semibold uppercase tracking-wider text-white">Admissions portal</p>
                <p class="mt-1">Academic year 2026-2027</p>
            </div>
        </div>
    </header>
    <div class="h-2 bg-[#93c5fd]"></div>

    <main class="mx-auto max-w-7xl px-5 py-10 lg:px-8 lg:py-14">
        <div class="mx-auto mb-10 max-w-4xl text-center">
            <p class="mb-3 text-sm font-bold uppercase tracking-[0.2em] text-[#2563eb]">New student registration</p>
            <h1 class="text-4xl font-bold tracking-tight text-[#263746] md:text-5xl">Build your next chapter.</h1>
            <p class="mx-auto mt-4 max-w-3xl text-base leading-7 text-slate-600">Submit your details to begin your student record with the College of Computer Studies. Please use accurate information throughout this form.</p>
        </div>

        @if (session('success'))
            <div class="mx-auto mb-6 max-w-5xl rounded-xl border border-green-200 bg-green-50 p-4">
                <div class="flex items-start gap-3">
                    <div>
                        <p class="font-semibold text-green-800">
                            Success
                        </p>

                        <p class="mt-1 text-sm text-green-700">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
                <h3 class="font-semibold text-red-800">
                    Please check your information.
                </h3>

                <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mx-auto max-w-5xl">
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="overflow-hidden border border-[#d1d5db] bg-white shadow-[0_14px_40px_rgba(38,55,70,0.08)]">
                @csrf
                <section class="border-b border-[#d1d5db] p-6 md:p-8">
                    <div class="mb-6 flex items-start gap-4"><span class="section-number flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-sm font-bold">01</span><div><h2 class="text-xl font-bold">Student information</h2><p class="mt-1 text-sm text-slate-500">Tell us who you are.</p></div></div>
                    <div class="grid gap-5 md:grid-cols-2">
                        <div class="md:col-span-2"><label for="student_id" class="mb-2 block text-sm font-semibold">Student ID</label><input id="student_id" type="text" name="student_id" value="{{ old('student_id') }}" placeholder="xxxx-xxxx" pattern="[0-9]{4}-[0-9]{4}" maxlength="9" inputmode="numeric" title="Use 8 digits in this format: 0123-4567" class="field w-full rounded-md px-4 py-3" required></div>
                        <div><label for="first_name" class="mb-2 block text-sm font-semibold">First name</label><input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" placeholder="First name" class="field w-full rounded-md px-4 py-3" required></div>
                        <div><label for="middle_name" class="mb-2 block text-sm font-semibold">Middle name <span class="font-normal text-slate-400">(optional)</span></label><input id="middle_name" type="text" name="middle_name" value="{{ old('middle_name') }}" placeholder="Middle name" class="field w-full rounded-md px-4 py-3"></div>
                        <div><label for="last_name" class="mb-2 block text-sm font-semibold">Last name</label><input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Last name" class="field w-full rounded-md px-4 py-3" required></div>
                        <div><label for="date_of_birth" class="mb-2 block text-sm font-semibold">Date of birth</label><input id="date_of_birth" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="field w-full rounded-md px-4 py-3" required></div>
                        <div><label for="gender" class="mb-2 block text-sm font-semibold">Gender</label><select id="gender" name="gender" class="field w-full rounded-md px-4 py-3" required><option value="">Select gender</option><option value="Male" @selected(old('gender') === 'Male')>Male</option><option value="Female" @selected(old('gender') === 'Female')>Female</option><option value="Prefer not to say" @selected(old('gender') === 'Prefer not to say')>Prefer not to say</option></select></div>
                    </div>
                </section>

                <section class="border-b border-[#d1d5db] p-6 md:p-8">
                    <div class="mb-6 flex items-start gap-4"><span class="section-number flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-sm font-bold">02</span><div><h2 class="text-xl font-bold">Contact information</h2><p class="mt-1 text-sm text-slate-500">How can the university reach you?</p></div></div>
                    <div class="grid gap-5 md:grid-cols-2">
                        <div><label for="email" class="mb-2 block text-sm font-semibold">Email address</label><input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="student@example.com" class="field w-full rounded-md px-4 py-3" required></div>
                        <div><label for="mobile_number" class="mb-2 block text-sm font-semibold">Mobile number</label><input id="mobile_number" type="tel" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="09XXXXXXXXX" class="field w-full rounded-md px-4 py-3" required></div>
                        <div class="md:col-span-2"><label for="address" class="mb-2 block text-sm font-semibold">Complete address</label><textarea id="address" name="address" rows="3" placeholder="House number, street, barangay, municipality" class="field w-full rounded-md px-4 py-3" required>{{ old('address') }}</textarea></div>
                    </div>
                </section>

                <section class="border-b border-[#d1d5db] p-6 md:p-8">
                    <div class="mb-6 flex items-start gap-4"><span class="section-number flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-sm font-bold">03</span><div><h2 class="text-xl font-bold">Academic information</h2><p class="mt-1 text-sm text-slate-500">Choose your program and current year level.</p></div></div>
                    <div class="grid gap-5 md:grid-cols-2">
                        <div><label for="program" class="mb-2 block text-sm font-semibold">Program</label><select id="program" name="program" class="field w-full rounded-md px-4 py-3" required><option value="">Select program</option><option value="BS Information Technology" @selected(old('program') === 'BS Information Technology')>BS Information Technology</option><option value="BS Computer Science" @selected(old('program') === 'BS Computer Science')>BS Computer Science</option></select></div>
                        <div><label for="year_level" class="mb-2 block text-sm font-semibold">Year level</label><select id="year_level" name="year_level" class="field w-full rounded-md px-4 py-3" required><option value="">Select year level</option><option value="1st Year" @selected(old('year_level') === '1st Year')>1st Year</option><option value="2nd Year" @selected(old('year_level') === '2nd Year')>2nd Year</option><option value="3rd Year" @selected(old('year_level') === '3rd Year')>3rd Year</option><option value="4th Year" @selected(old('year_level') === '4th Year')>4th Year</option></select></div>
                    </div>
                </section>

                <section class="p-6 md:p-8">
                    <div class="mb-6 flex items-start gap-4"><span class="section-number flex h-8 w-8 shrink-0 items-center justify-center rounded-full text-sm font-bold">04</span><div><h2 class="text-xl font-bold">Profile picture</h2><p class="mt-1 text-sm text-slate-500">Use a recent, clear image in JPG or PNG format.</p></div></div>

                    <div class="flex flex-col items-center gap-6 sm:flex-row sm:items-start">
                        {{-- Preview --}}
                        <div class="shrink-0">
                            <div id="preview-wrap" class="relative h-32 w-32 overflow-hidden rounded-full border-4 border-[#93c5fd] bg-slate-100 shadow-md">
                                <img id="preview-img" src="" alt="" class="hidden h-full w-full object-cover">
                                <div id="preview-placeholder" class="flex h-full w-full flex-col items-center justify-center gap-1 text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" /></svg>
                                    <span class="text-xs">No photo</span>
                                </div>
                            </div>
                        </div>

                        {{-- Drop zone --}}
                        <label for="profile_picture" id="drop-zone"
                            class="flex flex-1 cursor-pointer flex-col items-center justify-center gap-3 rounded-xl border-2 border-dashed border-[#93c5fd] bg-[#eff6ff] px-6 py-8 text-center transition hover:border-[#2563eb] hover:bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-[#2563eb]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" /></svg>
                            <div>
                                <p class="text-sm font-semibold text-[#263746]">Click to upload <span class="text-[#2563eb]">or drag &amp; drop</span></p>
                                <p class="mt-1 text-xs text-slate-500">JPG, JPEG, or PNG &mdash; max 2 MB</p>
                            </div>
                            <span id="file-name" class="hidden rounded-full bg-white px-3 py-1 text-xs font-medium text-[#2563eb] shadow-sm ring-1 ring-[#93c5fd]"></span>
                            <input id="profile_picture" type="file" name="profile_picture" accept=".jpg,.jpeg,.png" class="sr-only" required>
                        </label>
                    </div>

                    @error('profile_picture')
                        <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </section>

                <script>
                    const input = document.getElementById('profile_picture');
                    const img   = document.getElementById('preview-img');
                    const ph    = document.getElementById('preview-placeholder');
                    const label = document.getElementById('file-name');
                    const zone  = document.getElementById('drop-zone');

                    function applyFile(file) {
                        if (!file) return;
                        label.textContent = file.name;
                        label.classList.remove('hidden');
                        const url = URL.createObjectURL(file);
                        img.src = url;
                        img.classList.remove('hidden');
                        ph.classList.add('hidden');
                    }

                    input.addEventListener('change', () => applyFile(input.files[0]));

                    zone.addEventListener('dragover', e => { e.preventDefault(); zone.classList.add('border-[#2563eb]', 'bg-blue-100'); });
                    zone.addEventListener('dragleave', () => zone.classList.remove('border-[#2563eb]', 'bg-blue-100'));
                    zone.addEventListener('drop', e => {
                        e.preventDefault();
                        zone.classList.remove('border-[#2563eb]', 'bg-blue-100');
                        const file = e.dataTransfer.files[0];
                        if (file) {
                            const dt = new DataTransfer();
                            dt.items.add(file);
                            input.files = dt.files;
                            applyFile(file);
                        }
                    });
                </script>

                <div class="flex flex-col gap-4 bg-[#eff6ff] p-6 sm:flex-row sm:items-center sm:justify-between md:px-8"><p class="text-xs leading-5 text-slate-600">By submitting, you confirm that the information provided is accurate.</p><button type="submit" class="shrink-0 rounded-md bg-[#2563eb] px-7 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-[#1d4ed8] focus:outline-none focus:ring-4 focus:ring-blue-200">Submit registration</button></div>
            </form>
        </div>
    </main>
</body>
</html>
