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
<style>
    .box {
    margin-left: 50px;
    margin-right: 50px;
    margin-top: 25px;
    }

     /* The Modal (background) */
     .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close:hover,
        .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
        }

        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto; /* Center the table horizontally */
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

</style>
<body>
    <section class="box">
    <div class="grid">
        <label for="file">
            Insert a file to write queries in it
            <input type="file" id="file" name="file" accept=".csv" />
        </label>
        <div id="prompt-display">Prompt will be displayed here</div>
        <button onclick="showPrevious()">Previous</button>
        <button onclick="showNext()">Next</button>
        <button onclick="openCSVModal()">View CSV</button>
    </div>

    <div id="csvModal" class="modal">
        <div class="modal-content">
        <span class="close" onclick="closeCSVModal()">&times;</span>
        <h2>CSV Data</h2>
        <table id="csvTable">
            <!-- CSV data will be displayed here -->
        </table>
        </div>
    </div>

    <form id="option-form">
        <h3>Select Options to make and test completions:</h3>
        <nav>
        <ul>
            <select id="list1">
                <option value="Report">Report</option>
                <option value="User">User</option>
                <option value="Company">Company</option>
            </select>
            <select id="list2">
                <option value="">Blank</option>
                <option value="all">All</option>
                <option value="whereHas('department',function($query){$query->where('name','ILIKE','%NOMBRE%');})">(Rep) For the Department</option>
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
                <option value="whereBetween('created_at', ['AAAA-MM-DD-START', 'AAAA-MM-DD-END'])">Range of dates</option>
                <option value="whereDate('created_at','AAAA-MM-DD')">Specific date</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)=?',[MM])">Specific month</option>
                <option value="whereRaw('EXTRACT(YEAR FROM created_at)=?',[AAAA])">Specific year</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=1 AND EXTRACT(MONTH FROM created_at)<=6')">First semester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=7 AND EXTRACT(MONTH FROM created_at)<=12')">Second semester</option>
                <!-- <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=1 AND EXTRACT(MONTH FROM created_at)<=4')">First cuatrimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=5 AND EXTRACT(MONTH FROM created_at)<=8')">Second cuatrimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=9 AND EXTRACT(MONTH FROM created_at)<=12')">Third cuatrimester</option> -->
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=1 AND EXTRACT(MONTH FROM created_at)<=3')">First quarter</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=4 AND EXTRACT(MONTH FROM created_at)<=6')">Second quarter</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=7 AND EXTRACT(MONTH FROM created_at)<=9')">Third quarter</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=10 AND EXTRACT(MONTH FROM created_at)<=12')">Fourth quarter</option>
                <!-- <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=1 AND EXTRACT(MONTH FROM created_at)<=2')">First Bimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=3 AND EXTRACT(MONTH FROM created_at)<=4')">Second Bimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=5 AND EXTRACT(MONTH FROM created_at)<=6')">Third Bimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=7 AND EXTRACT(MONTH FROM created_at)<=8')">Fourth Bimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=9 AND EXTRACT(MONTH FROM created_at)<=10')">Fifth Bimester</option>
                <option value="whereRaw('EXTRACT(MONTH FROM created_at)>=11 AND EXTRACT(MONTH FROM created_at)<=12')">Sixth Bimester</option> -->
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

        <div id="combined-options">
            <div class="grid">
                <nav id="VariableDep" style="display: none;">
                    @if ($Dnames->isEmpty())
                    <p>Pues no lmao</p>
                    @else
                    <select id="variableSelectDep" onchange="replaceVariableName()">
                        <option value="" disabled selected>Departments</option>
                        <!-- <option value="" data-custom="true">Enter custom text</option> -->
                        @foreach ($Dnames as $names)
                            <option value="{{$names}}">{{$names}}</option>
                        @endforeach
                    </select>
                    @endif
                </nav>
                <nav id="VariableRange" style="display: none;">
                    <p>Hola</p>
                </nav>
                <nav id="VariableDate" style="display: none;">
                    <input type="date" id="variableSelectDate" onchange="replaceDate()" placeholder="Date">
                </nav>
                <nav id="VariableMonth" style="display: none;">
                    <select id="variableSelectMonth" onchange="replaceMonth()">
                        <option value="" disabled selected>Select a month</option>
                        <option value="[1]">January</option>
                        <option value="[2]">February</option>
                        <option value="[3]">March</option>
                        <option value="[4]">April</option>
                        <option value="[5]">May</option>
                        <option value="[6]">June</option>
                        <option value="[7]">July</option>
                        <option value="[8]">August</option>
                        <option value="[9]">September</option>
                        <option value="[10]">October</option>
                        <option value="[11]">November</option>
                        <option value="[12]">December</option>
                    </select>
                </nav>
                <nav id="VariableYear" style="display: none;">
                <select id="variableSelectYear" onchange="replaceYear()">
                    @php
                        $currentYear = date("Y");
                        $startYear = 2000; // Change this to your desired start year
                        $endYear = $currentYear; // Change this to your desired end year
                    @endphp
                    @for ($year = $startYear; $year <= $endYear; $year++)
                        <option value="[{{ $year }}]">{{ $year }}</option>
                    @endfor
                </select>
                </nav>
                <nav id="VariableOrder" style="display: none;">
                    @if (empty($columnsRep))
                    <p>Pues no lmao</p>
                    @else
                    <select id="variableSelectOrder" onchange="replaceOrder()">
                    <option value="" disabled selected>Order by</option>
                    @foreach ($columnsRep as $rows)
                        @if ($rows != 'company_id' && $rows != 'department_id' && $rows != 'data')
                            <option value="{{ $rows }}">{{ $rows }}</option>
                        @endif
                    @endforeach

                    </select>
                    @endif
                </nav>
                <nav id="VariableLimit" style="display: none;">
                    <input type="number" id="variableSelectLimit" min="1" onchange="replaceLimit()" placeholder="Limit number">
                </nav>
            </div>
            <form id="data-form">
                <textarea id="result"></textarea>
                <div class="grid">
                <button type="button" onclick="combineOptions()">Combine Options</button>
                <button type="button" onclick="copyToClipboard()">Copy to Clipboard</button>
                </div>
            </form>
        </div>
    </form>
    <br>
    <form method="POST" action="{{ route('api.eloquent') }}" target="_blank">
    @csrf
        <label for="consulta">Test Eloquent query:</label>
        <textarea name="consulta" id="consulta"></textarea>
        <div class="grid">
            <button type="submit">Submit</button>
            <button onclick="insertTextIntoNextColumn()" type="button">Insert into Next Column</button>
        </div>
    </form>
    <script>
        var checker = ["NOMBRE","AAAA-MM-DD","[MM]","[AAAA]","DATO","(NUMERO)","name","AAAA-MM-DD-START","AAAA-MM-DD-END","company","department"];

       function combineOptions() {
        const list1Value = '##'+document.getElementById('list1').value;
        const list2Value = document.getElementById('list2').value;
        if (list2Value === 'all'){
            document.getElementById('result').value = list1Value+'::all();##';
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
        
        combinedOptions += '->get();##';
        
        document.getElementById('result').value = combinedOptions;

        var resultTextbox = document.getElementById("result");
        var resultValue = resultTextbox.value;

        
        // Get the section with id "titulos"
        var namesDepSection = document.getElementById("VariableDep");
        var rangeSection = document.getElementById("VariableRange");
        var datesSection = document.getElementById("VariableDate");
        var monthSection = document.getElementById("VariableMonth");
        var yearSection = document.getElementById("VariableYear");
        var orderSection = document.getElementById("VariableOrder");
        var numberSection = document.getElementById("VariableLimit");

        if (resultValue.includes(checker[0]) && resultValue.includes(checker[6]) && resultValue.includes(checker[10]) ){
            // Show the "titulos" section
            namesDepSection.style.display = "block";
        }
        else {
            // Hide the "titulos" section
            namesDepSection.style.display = "none";
        }

        if(resultValue.includes(checker[1])){
            datesSection.style.display = "block";
        }
        else {
            datesSection.style.display = "none";
        }

        if(resultValue.includes(checker[2])){
            monthSection.style.display = "block";
        }
        else {
            monthSection.style.display = "none";
        }

        if(resultValue.includes(checker[3])){
            yearSection.style.display = "block";
        }
        else {
            yearSection.style.display = "none";
        }

        //Check for DATO (order)
        if(resultValue.includes(checker[4])){
            orderSection.style.display = "block";
        }
        else {
            orderSection.style.display = "none";
        }

        //Check for NUMERO (Limit)
        if(resultValue.includes(checker[5])){
            numberSection.style.display = "block";
        }
        else {
            numberSection.style.display = "none";
        }

        }

        // Declare a global JavaScript variable to store the selected variable
        //var checker = ["NOMBRE","AAAA-MM-DD","MM","AAAA","DATO","NUMERO"];
        var stored = "";
        var selectedVariableDep = "";
        function replaceVariableName() {
            var resultTextbox = document.getElementById("result");
            var variableSelectDep = document.getElementById("variableSelectDep");
            selectedVariableDep = variableSelectDep.value;

            var resultValue = resultTextbox.value;
            if(resultValue.includes(checker[0])){
                var updatedResultValue = resultValue.replaceAll(checker[0], selectedVariableDep);
            }
            else{
                var updatedResultValue = resultValue.replaceAll(stored, selectedVariableDep);
            }

            stored = selectedVariableDep;

            // Update the textarea with the replaced value
            resultTextbox.value = updatedResultValue;
        }

        var storedDate = "";
        var selectedDate = "";
        function replaceDate() {
            var resultTextbox = document.getElementById("result");
            var dateInput = document.getElementById("variableSelectDate");
            selectedDate = dateInput.value; // Update the global variable

            var resultValue = resultTextbox.value;
            var datePlaceholder = checker[1]; // Assuming checker[1] contains the date placeholder

            if (resultValue.includes(datePlaceholder)) {
                var updatedResultValue = resultValue.replaceAll(datePlaceholder, selectedDate);
            } else {
                var updatedResultValue = resultValue.replaceAll(storedDate, selectedDate);
            }

            storedMonth = selectedMonth;
            // Update the textarea with the replaced value
            resultTextbox.value = updatedResultValue;
        }

        var storedMonth = "";
        var selectedMonth = "";
        function replaceMonth() {
            var resultTextbox = document.getElementById("result");
            var monthSelect = document.getElementById("variableSelectMonth");
            selectedMonth = monthSelect.value; // Update the global variable

            var resultValue = resultTextbox.value;
            var monthPlaceholder = checker[2];

            if (resultValue.includes(monthPlaceholder)) {
                var updatedResultValue = resultValue.replaceAll(monthPlaceholder, selectedMonth);
            } else {
                var updatedResultValue = resultValue.replaceAll(storedMonth, selectedMonth);
            }

            storedMonth = selectedMonth;
            // Update the textarea with the replaced value
            resultTextbox.value = updatedResultValue;
        }


        var storedYear = "";
        var selectedYear = "";
        function replaceYear() {
            var resultTextbox = document.getElementById("result");
            var yearSelect = document.getElementById("variableSelectYear");
            selectedYear = yearSelect.value; // Update the global variable

            var resultValue = resultTextbox.value;
            var yearPlaceholder = checker[3];

            if (resultValue.includes(yearPlaceholder)) {
                var updatedResultValue = resultValue.replaceAll(yearPlaceholder, selectedYear);
            } else {
                var updatedResultValue = resultValue.replaceAll(storedYear, selectedYear);
            }

            storedYear = selectedYear;
            // Update the textarea with the replaced value
            resultTextbox.value = updatedResultValue;
        }


        var storedOrder = "";
        var selectedOrder = "";
        function replaceOrder() {
            var resultTextbox = document.getElementById("result");
            var orderSelect = document.getElementById("variableSelectOrder");
            selectedOrder = orderSelect.value; // Update the global variable

            var resultValue = resultTextbox.value;
            var orderPlaceholder = checker[4];

            if (resultValue.includes(orderPlaceholder)) {
                var updatedResultValue = resultValue.replaceAll(orderPlaceholder, selectedOrder);
            } else {
                var updatedResultValue = resultValue.replaceAll(storedOrder, selectedOrder);
            }

            storedOrder = selectedOrder;
            // Update the textarea with the replaced value
            resultTextbox.value = updatedResultValue;
        }


        var storedLimit = "";
        var selectedLimit = "";
        function replaceLimit() {
            var resultTextbox = document.getElementById("result");
            var limitSelect = document.getElementById("variableSelectLimit");
            selectedLimit = limitSelect.value; // Update the global variable

            var resultValue = resultTextbox.value;
            var limitPlaceholder = checker[5];

            if (resultValue.includes(limitPlaceholder)) {
                var updatedResultValue = resultValue.replaceAll(limitPlaceholder, '('+selectedLimit+')');
            } else {
                var updatedResultValue = resultValue.replaceAll('take('+storedLimit+')', 'take('+selectedLimit+')');
            }

            storedLimit = selectedLimit;
            // Update the textarea with the replaced value
            resultTextbox.value = updatedResultValue;
        }

        function copyToClipboard() {
            const result = document.getElementById('result');
            result.select();
            document.execCommand('copy');
        }


        document.getElementById('file').addEventListener('change', handleFileSelect);

    let csvData = [];
    let currentIndex = 0;

    function handleFileSelect(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const contents = e.target.result;
                csvData = parseCSV(contents);
                displayCurrentData();
            };

            reader.readAsText(file);
        }
    }

    function parseCSV(data) {
        const lines = data.split('\n');
        const result = [];

        for (let i = 1; i < lines.length; i++) {
            const values = lines[i].split(',');
            if (values.length >= 1) {
                result.push(values[0].trim());
            }
        }

        return result;
    }

    function displayCurrentData() {
        const promptDisplay = document.getElementById('prompt-display');
        if (csvData.length > 0 && currentIndex >= 0 && currentIndex < csvData.length) {
            promptDisplay.innerHTML = csvData[currentIndex];
        }
    }

    function showNext() {
        if (currentIndex < csvData.length - 1) {
            currentIndex++;
            displayCurrentData();
        }
    }

    function showPrevious() {
        if (currentIndex > 0) {
            currentIndex--;
            displayCurrentData();
        }
    }

    function insertTextIntoNextColumn() {
        const textarea = document.getElementById('consulta');
        if (csvData.length > 0 && currentIndex >= 0 && currentIndex < csvData.length) {
            const promptDisplay = document.getElementById('prompt-display');
            promptDisplay.innerHTML += ` - ${textarea.value}`;
        }
    }

        function openCSVModal() {
        const modal = document.getElementById('csvModal');
        modal.style.display = 'block';
        populateCSVTable();
        }

        function closeCSVModal() {
            const modal = document.getElementById('csvModal');
            modal.style.display = 'none';
        }

        function populateCSVTable() {
            const csvTable = document.getElementById('csvTable');
            csvTable.innerHTML = ''; // Clear previous data

            if (csvData.length > 0) {
                const headerRow = csvTable.insertRow(0);
                headerRow.insertCell(0).innerHTML = 'Prompt';
                headerRow.insertCell(1).innerHTML = 'Completion';

                for (let i = 0; i < csvData.length; i++) {
                    const row = csvTable.insertRow(i + 1);
                    const promptCell = row.insertCell(0);
                    promptCell.innerHTML = csvData[i];

                    // Create an empty cell for the "Completion" column
                    const completionCell = row.insertCell(1);
                    completionCell.innerHTML = '';
                }
            }
        }
    </script>
    </section>
</body>
</body>
</html>
