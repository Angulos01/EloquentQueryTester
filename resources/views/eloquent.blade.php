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
    <h1>Eloquent Query</h1>
    <form method="POST" action="{{ route('api.eloquent') }}">
    @csrf
        <label for="consulta">Enter Eloquent Query:</label>
        <textarea name="consulta" id="consulta"></textarea>
        <div class="grid">
            <button type="submit">Submit</button>
            <button type="button" onclick="clearTextarea()">Delete</button>
            <button type="button" onclick="pasteFromClipboard()">Paste</button>
        </div>
    </form>
    <br>
    <h1>Query maker</h1>
    <form id="option-form">
        <h2>Select Options:</h2>
        <nav>
        <ul>
            <select id="list1">
                <option value="Report">Report</option>
                <option value="Users">Users</option>
                <option value="Company">Company</option>
            </select>
            <select id="list2">
                <option value="">Blank</option>
                <option value="all">All</option>
                <option value="whereHas('company',function($query){$query->where('name','ILIKE','%NOMBRE%');})">(Rep) For the company</option>
                <option value="where('title','ILIKE','%NOMBRE%')">(Rep) With the name</option>
            </select>
            <select id="list3">
                <option value="">Blank</option>
                <option value="whereDate('created_at',today())">Today</option>
                <option value="whereDate('created_at','=',DB::raw('CURRENT_DATE-INTERVAL\'1day\''))">Yesterday</option>
                <option value="whereBetween('created_at',[date('Y-m-d H:i:s',strtotime('this week monday')),date('Y-m-d H:i:s',strtotime('this week sunday23:59:59'))])">This Week</option>
                <option value="whereRaw('EXTRACT(WEEK FROM created_at)=EXTRACT(WEEK FROM NOW())-1')">Last week</option>
                <option value="whereRaw('created_at>=(CURRENT_DATE-INTERVAL\'14 days\') AND created_at<=CURRENT_DATE')">Last two weeks</option>
                <option value="whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))">This month</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)=EXTRACT(MONTH FROM NOW())-1 AND EXTRACT(YEAR FROM created_at)=EXTRACT(YEAR FROM NOW())')">Last month</option>
                <option value="whereRaw('EXTRACT(YEAR FROM created_at)=EXTRACT(YEAR FROM NOW())')">This year</option>
                <option value="whereRaw('EXTRACT(YEAR FROM created_at)=EXTRACT(YEAR FROM NOW())-1')">Last year</option>
                <option value="whereDate('created_at','AAAA-MM-DD')">Specific date</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)=?',[MM])">Specific month</option>
                <option value="whereRaw('EXTRACT(YEAR FROM created_at)=?',[ANIO])">Specific year</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=1 AND EXTRACT(MONTH FROM created_at)<=6')">First semester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=7 AND EXTRACT(MONTH FROM created_at)<=12')">Second semester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=1 AND EXTRACT(MONTH FROM created_at)<=4')">First cuatrimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=5 AND EXTRACT(MONTH FROM created_at)<=8')">Second cuatrimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=9 AND EXTRACT(MONTH FROM created_at)<=12')">Third cuatrimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=1 AND EXTRACT(MONTH FROM created_at)<=3')">First Trimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=4 AND EXTRACT(MONTH FROM created_at)<=6')">Second Trimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=7 AND EXTRACT(MONTH FROM created_at)<=9')">Third Trimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=10 AND EXTRACT(MONTH FROM created_at)<=12')">Fourth Trimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=1 AND EXTRACT(MONTH FROM created_at)<=2')">First Bimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=3 AND EXTRACT(MONTH FROM created_at)<=4')">Second Bimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=5 AND EXTRACT(MONTH FROM created_at)<=6')">Third Bimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=7 AND EXTRACT(MONTH FROM created_at)<=8')">Fourth Bimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=9 AND EXTRACT(MONTH FROM created_at)<=10')">Fifth Bimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=11 AND EXTRACT(MONTH FROM created_at)<=12')">Sixth Bimester</option>
            </select>
            <select id="list4">
                <option value="">Blank</option>
                <option value="orderBy('DATO','asc')">Ascendente</option>
                <option value="orderBy('DATO','desc')">Descendente</option>
            </select>
            <select id="list5">
                <option value="">Blank</option>
                <option value="take(NUMERO)">Limit</option>
            </select>
        </ul>
      </nav>
        <button type="button" onclick="combineOptions()">Combine Options</button>

        <div id="combined-options">
            <h2>Combined Options:</h2>
            <textarea id="result" rows="5" readonly></textarea>
            <button type="button" onclick="copyToClipboard()">Copy to Clipboard</button>
        </div>
    </form>
    <script>
       function combineOptions() {
        const list1Value = document.getElementById('list1').value;
        const list2Value = document.getElementById('list2').value;
        if (list2Value === 'all'){
            document.getElementById('result').value = list1Value+'::all();';
            return;
        }
        const list3Value = document.getElementById('list3').value;
        const list4Value = document.getElementById('list4').value;
        const list5Value = document.getElementById('list5').value;
        
        const selectedOptions = [list1Value, list2Value, list3Value, list4Value, list5Value];
        
        // Filter out blank options
        const nonBlankOptions = selectedOptions.filter(option => option !== "");
        
        // Combine non-blank options with "::" for the first and "->" for the rest
        let combinedOptions = nonBlankOptions[0];
        if (nonBlankOptions.length > 1) {
            combinedOptions += "::" + nonBlankOptions.slice(1).join("->");
        }
        
        combinedOptions += '->get();';
        
        document.getElementById('result').value = combinedOptions;
    }

        function copyToClipboard() {
            const result = document.getElementById('result');
            result.select();
            document.execCommand('copy');
        }

        function clearTextarea() {
        document.getElementById('consulta').value = '';
    }

    function pasteFromClipboard() {
        navigator.clipboard.readText()
            .then(text => {
                document.getElementById('consulta').value = text;
            })
            .catch(err => {
                console.error('Failed to read text from clipboard: ', err);
            });
    }
    </script>
  </header>
</body>
</html>
