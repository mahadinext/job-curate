<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewable PDF</title>
</head>
<body>
    <embed src="data:application/pdf;base64,{{ $pdfEmbed }}" type="application/pdf" width="100%" height="1000px" download="{{ $pdfName }}">
    {{-- <a href="data:application/pdf;base64,{{ $pdfEmbed }}" download="{{ $pdfName }}">Download PDF</a> --}}
</body>
</html>
