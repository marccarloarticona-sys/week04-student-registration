<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students | LSPU CCS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-800">
    <header class="bg-[#263746] text-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between gap-6 px-5 py-5 lg:px-8">
            <a href="{{ route('students.index') }}" class="flex items-center gap-4">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full border-2 border-[#93c5fd] text-sm font-bold">LSPU</span>
                <span>
                    <span class="block text-sm font-semibold uppercase tracking-[0.18em] text-[#93c5fd]">Laguna State Polytechnic University</span>
                    <span class="mt-1 block text-sm text-slate-300">College of Computer Studies</span>
                </span>
            </a>
            <a href="{{ route('students.create') }}" class="rounded-md bg-[#2563eb] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#1d4ed8]">Register Student</a>
        </div>
    </header>
    <div class="h-2 bg-[#93c5fd]"></div>

    <main class="mx-auto max-w-6xl px-5 py-10 lg:px-8 lg:py-14">
        <div class="mb-10 flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="mb-3 text-sm font-bold uppercase tracking-[0.2em] text-[#2563eb]">Student directory</p>
                <h1 class="text-4xl font-bold tracking-tight text-[#263746]">Registered students</h1>
                <p class="mt-3 text-slate-600">Browse student profiles registered with the College of Computer Studies.</p>
            </div>
            <p class="text-sm font-semibold text-slate-500">{{ $students->count() }} {{ $students->count() === 1 ? 'student' : 'students' }}</p>
        </div>

        <nav class="mb-8 flex flex-wrap gap-2" aria-label="Filter students by program">
            <a href="{{ route('students.index') }}" class="rounded-md border px-4 py-2 text-sm font-semibold transition {{ !in_array($program, ['bsit', 'bsccs'], true) ? 'border-[#2563eb] bg-[#2563eb] text-white' : 'border-slate-300 text-slate-600 hover:bg-slate-100' }}">All programs</a>
            <a href="{{ route('students.index', ['program' => 'bsit']) }}" class="rounded-md border px-4 py-2 text-sm font-semibold transition {{ $program === 'bsit' ? 'border-[#2563eb] bg-[#2563eb] text-white' : 'border-slate-300 text-slate-600 hover:bg-slate-100' }}">BSIT</a>
            <a href="{{ route('students.index', ['program' => 'bsccs']) }}" class="rounded-md border px-4 py-2 text-sm font-semibold transition {{ $program === 'bsccs' ? 'border-[#2563eb] bg-[#2563eb] text-white' : 'border-slate-300 text-slate-600 hover:bg-slate-100' }}">BSCCS</a>
        </nav>

        @if ($students->isEmpty())
            <div class="border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
                <h2 class="text-xl font-bold text-[#263746]">No students registered yet</h2>
                <p class="mt-2 text-slate-500">Start by adding the first student profile.</p>
                <a href="{{ route('students.create') }}" class="mt-6 inline-block rounded-md bg-[#2563eb] px-6 py-3 text-sm font-bold text-white transition hover:bg-[#1d4ed8]">Register First Student</a>
            </div>
        @else
            <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($students as $student)
                    <article class="overflow-hidden border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <div class="h-2 bg-[#93c5fd]"></div>
                        <div class="p-6">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="{{ $student->first_name }} {{ $student->last_name }}" class="h-20 w-20 rounded-full border-4 border-blue-50 object-cover">
                                <div class="min-w-0">
                                    <p class="text-xs font-bold uppercase tracking-wider text-[#2563eb]">{{ $student->student_id }}</p>
                                    <h2 class="mt-1 truncate text-xl font-bold text-[#263746]">{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</h2>
                                    <p class="mt-1 truncate text-sm text-slate-500">{{ $student->program }}</p>
                                </div>
                            </div>

                            <dl class="mt-6 space-y-3 border-t border-slate-100 pt-5 text-sm">
                                <div class="flex justify-between gap-4"><dt class="text-slate-400">Year level</dt><dd class="text-right font-medium">{{ $student->year_level }}</dd></div>
                                <div class="flex justify-between gap-4"><dt class="text-slate-400">Email</dt><dd class="max-w-[65%] truncate text-right font-medium">{{ $student->email }}</dd></div>
                                <div class="flex justify-between gap-4"><dt class="text-slate-400">Mobile</dt><dd class="text-right font-medium">{{ $student->mobile_number }}</dd></div>
                            </dl>

                            <a href="{{ route('students.show', $student) }}" class="mt-6 block rounded-md border border-[#2563eb] px-4 py-3 text-center text-sm font-bold text-[#2563eb] transition hover:bg-blue-50">View full profile</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </main>
</body>
</html>
