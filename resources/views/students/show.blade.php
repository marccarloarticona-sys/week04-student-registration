<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Profile | LSPU CCS</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">

    <header class="bg-[#263746] text-white">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-5 py-5 lg:px-8">

            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-full border-2 border-[#93c5fd] text-sm font-bold">
                    LSPU
                </div>

                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.18em] text-[#93c5fd]">
                        Laguna State Polytechnic University
                    </p>

                    <p class="mt-1 text-sm text-slate-300">
                        College of Computer Studies
                    </p>
                </div>
            </div>

        </div>
    </header>

    <div class="h-2 bg-[#93c5fd]"></div>

    <main class="mx-auto max-w-5xl px-5 py-10 lg:px-8 lg:py-14">

        @if (session('success'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-5 py-4 text-green-800">
                <p class="font-semibold">Registration successful</p>

                <p class="mt-1 text-sm">
                    {{ session('success') }}
                </p>
            </div>
        @endif

        <div class="overflow-hidden border border-slate-200 bg-white shadow-sm">

            {{-- Profile Header --}}
            <div class="bg-[#eff6ff] px-6 py-8 md:px-8">

                <div class="flex flex-col gap-6 sm:flex-row sm:items-center">

                    <img
                        src="{{ asset('storage/' . $student->profile_picture) }}"
                        alt="{{ $student->first_name }} {{ $student->last_name }}"
                        class="h-32 w-32 rounded-full border-4 border-white object-cover shadow"
                    >

                    <div>

                        <p class="text-sm font-bold uppercase tracking-widest text-blue-600">
                            Registered Student
                        </p>

                        <h1 class="mt-2 text-3xl font-bold text-[#263746]">
                            {{ $student->first_name }}
                            {{ $student->middle_name }}
                            {{ $student->last_name }}
                        </h1>

                        <p class="mt-2 text-slate-600">
                            {{ $student->student_id }}
                        </p>

                    </div>

                </div>

            </div>

            {{-- Details --}}
            <div class="p-6 md:p-8">

                <div class="mb-8">

                    <h2 class="text-lg font-bold text-[#263746]">
                        Personal Information
                    </h2>

                    <div class="mt-5 grid gap-5 md:grid-cols-2">

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Student ID
                            </p>

                            <p class="mt-1 font-medium">
                                {{ $student->student_id }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Gender
                            </p>

                            <p class="mt-1 font-medium">
                                {{ $student->gender }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Date of Birth
                            </p>

                            <p class="mt-1 font-medium">
                                {{ $student->date_of_birth }}
                            </p>
                        </div>

                    </div>

                </div>

                <hr class="border-slate-200">

                <div class="my-8">

                    <h2 class="text-lg font-bold text-[#263746]">
                        Contact Information
                    </h2>

                    <div class="mt-5 grid gap-5 md:grid-cols-2">

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Email Address
                            </p>

                            <p class="mt-1 font-medium">
                                {{ $student->email }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Mobile Number
                            </p>

                            <p class="mt-1 font-medium">
                                {{ $student->mobile_number }}
                            </p>
                        </div>

                        <div class="md:col-span-2">
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Address
                            </p>

                            <p class="mt-1 font-medium">
                                {{ $student->address }}
                            </p>
                        </div>

                    </div>

                </div>

                <hr class="border-slate-200">

                <div class="mt-8">

                    <h2 class="text-lg font-bold text-[#263746]">
                        Academic Information
                    </h2>

                    <div class="mt-5 grid gap-5 md:grid-cols-2">

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Program
                            </p>

                            <p class="mt-1 font-medium">
                                {{ $student->program }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                                Year Level
                            </p>

                            <p class="mt-1 font-medium">
                                {{ $student->year_level }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            {{-- Footer --}}
            <div class="flex justify-end bg-slate-50 px-6 py-5 md:px-8">

                <a
                    href="{{ route('students.create') }}"
                    class="rounded-md bg-[#2563eb] px-6 py-3 text-sm font-bold text-white transition hover:bg-[#1d4ed8]"
                >
                    Register Another Student
                </a>

            </div>

        </div>

    </main>

</body>
</html>