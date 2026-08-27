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

        @if ($errors->any())
            <div class="mb-6 border-l-4 border-red-500 bg-red-50 p-4 text-sm text-red-700" role="alert">
                <p class="font-semibold">Please review the following items:</p>
                <ul class="mt-2 list-disc space-y-1 pl-5">
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
                        <div class="md:col-span-2"><label for="student_id" class="mb-2 block text-sm font-semibold">Student ID</label><input id="student_id" type="text" name="student_id" value="{{ old('student_id') }}" placeholder="e.g. 2026-00001" class="field w-full rounded-md px-4 py-3" required></div>
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
                    <input id="profile_picture" type="file" name="profile_picture" accept=".jpg,.jpeg,.png" class="field block w-full rounded-md p-3 text-sm">
                </section>

                <div class="flex flex-col gap-4 bg-[#eff6ff] p-6 sm:flex-row sm:items-center sm:justify-between md:px-8"><p class="text-xs leading-5 text-slate-600">By submitting, you confirm that the information provided is accurate.</p><button type="submit" class="shrink-0 rounded-md bg-[#2563eb] px-7 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-[#1d4ed8] focus:outline-none focus:ring-4 focus:ring-blue-200">Submit registration</button></div>
            </form>
        </div>
    </main>
</body>
</html>
