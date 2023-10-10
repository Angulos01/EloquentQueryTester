<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Eloquent Query</title>
    <link rel="shortcut icon" href="https://picocss.com/favicon.ico" />
    <link rel="canonical" href="https://picocss.com/examples/basic-template/" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" />
    <link rel="stylesheet" href="css/custom.css" />
  </head>
<body>
    <header class="container">
    <form id="option-form">
        <h2>Select Options:</h2>
        
        <label for="list1">List 1:</label>
        <select id="list1">
            <option value="Option A">Option A</option>
            <option value="Option B">Option B</option>
            <option value="Option C">Option C</option>
        </select>

        <label for="list2">List 2:</label>
        <select id="list2">
            <option value="Option X">Option X</option>
            <option value="Option Y">Option Y</option>
            <option value="Option Z">Option Z</option>
        </select>

        <label for="list3">List 3:</label>
        <select id="list3">
            <option value="Option 1">Option 1</option>
            <option value="Option 2">Option 2</option>
            <option value="Option 3">Option 3</option>
        </select>

        <button type="button" onclick="combineOptions()">Combine Options</button>

        <div id="combined-options">
            <h2>Combined Options:</h2>
            <textarea id="result" rows="3" readonly></textarea>
            <button type="button" onclick="copyToClipboard()">Copy to Clipboard</button>
        </div>
    </form>
    </header>
    <script>
        function combineOptions() {
            const list1Value = document.getElementById('list1').value;
            const list2Value = document.getElementById('list2').value;
            const list3Value = document.getElementById('list3').value;
            
            const combinedOptions = `${list1Value}->${list2Value}->${list3Value}`;
            
            document.getElementById('result').value = combinedOptions;
        }

        function copyToClipboard() {
            const result = document.getElementById('result');
            result.select();
            document.execCommand('copy');
            alert('Combined options copied to clipboard: ' + result.value);
        }
    </script>
</body>
</html>
