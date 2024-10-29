<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journals</title>
</head>
<body>
    <h1>All Journals</h1>
    <ul>
        @foreach ($journals as $journal)
            <li>
                <h2>{{ $journal->title }}</h2>
                <p>{{ $journal->content }}</p>
                <p>Emotion: {{ $journal->emotion }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>
