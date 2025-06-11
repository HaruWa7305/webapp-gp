@extends('admin.layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Contact Form Submissions</h1>

    @if ($contactForms->isEmpty())
        <p class="text-gray-600">No submissions yet.</p>
    @else
        <table class="min-w-full bg-white border rounded shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Message</th>
                    <th class="py-2 px-4 border-b">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contactForms as $contactForm)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $contactForm->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $contactForm->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $contactForm->message }}</td>
                        <td class="py-2 px-4 border-b">{{ $contactForm->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
