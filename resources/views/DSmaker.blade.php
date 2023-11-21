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
    <style>
        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        ul {
            list-style: none;
            padding: 0;
            display: flex;
        }
        li {
            margin: 0 20px;
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

        .box {
            margin-left: 50px;
            margin-right: 50px;
            margin-top: 10px;
        }
    </style>
  </head>
<body>
      <nav class="container-fluid">
        <ul>
          <li>
            <a href="./"
              ><strong>Home</strong></a
            >
          </li>
          <li>
            <a href="./eloquent-form"
              ><strong>Tester</strong></a
            >
          </li>
          <li>
            <a><strong id="myBtn">Modal</strong></a>
          </li>
        </ul>
      </nav>

    <!-- The Modal -->
    <div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
    <span class="close">&times;</span>
        <table id="dataTable">
            <thead>
                <tr>
                    <th>Prompt</th>
                    <th>Completion</th>
                </tr>
            </thead>
            <tbody id="prompts">
                <!-- Table data will be added here using JavaScript -->
            </tbody>
        </table>
        <br>
        <button id="exportButton">Export as CSV</button>
    </div>

    </div>

  <section class="box">
  <h3>Complements and filters</h3>
  <section id="accordions">
        <input type="text" id="text" name="text" placeholder="Write complement here" />
        <details>
          <summary>Filters</summary>
          <fieldset>
          <div class="grid">
            <details open>
                <summary>Dates</summary>
                <label for="date-1">
                    <input type="checkbox" value="of today" class="date-filter"/>
                    of today
                </label>
                <label for="date-2">
                    <input type="checkbox" value="of yesterday" class="date-filter"/>
                    of yesterday
                </label>
                <label for="date-3">
                    <input type="checkbox" value="of this week" class="date-filter"/>
                    of this week
                </label>
                <label for="date-4">
                    <input type="checkbox" value="during the current week" class="date-filter"/>
                    during the current week
                </label>
                <label for="date-5">
                    <input type="checkbox" value="of last week" class="date-filter"/>
                    of last week
                </label>
                <label for="date-6">
                    <input type="checkbox" value="of last two weeks" class="date-filter"/>
                    of last two weeks
                </label>
                <label for="date-7">
                    <input type="checkbox" value="of this month" class="date-filter"/>
                    of this month
                </label>
                <label for="date-8">
                    <input type="checkbox" value="during the current month" class="date-filter"/>
                    during the current month
                </label>
                <label for="date-9">
                    <input type="checkbox" value="of last month" class="date-filter"/>
                    of last month
                </label>
                <label for="date-10">
                    <input type="checkbox" value="of this year" class="date-filter"/>
                    of this year
                </label>
                <label for="date-11">
                    <input type="checkbox" value="of the current year" class="date-filter"/>
                    of the current year
                </label>
                <label for="date-12">
                    <input type="checkbox" value="of last year" class="date-filter"/>
                    of last year
                </label>
                <label for="date-13">
                    <input type="checkbox" value="of of DD/MM/AAAA" class="date-filter"/>
                    of DD/MM/AAAA
                </label>
                <label for="date-14">
                    <input type="checkbox" value="of of MM/DD/AAAA" class="date-filter"/>
                    of MM/DD/AAAA
                </label>
                <label for="date-15">
                    <input type="checkbox" value="of MES" class="date-filter"/>
                    of MES
                </label>
                <label for="date-16">
                    <input type="checkbox" value="on the month of MES" class="date-filter"/>
                    on the month of MES
                </label>
                <label for="date-17">
                    <input type="checkbox" value="of ANIO" class="date-filter"/>
                    of ANIO
                </label>
                <label for="date-18">
                    <input type="checkbox" value="of the first semester" class="date-filter"/>
                    of the first semester
                </label>
                <label for="date-19">
                    <input type="checkbox" value="of the second semester" class="date-filter"/>
                    of the second semester
                </label>
                <label for="date-20">
                    <input type="checkbox" value="of the first quarter" class="date-filter"/>
                    of the first quarter
                </label>
                <label for="date-21">
                    <input type="checkbox" value="of the second quarter" class="date-filter"/>
                    of the second quarter
                </label>
                <label for="date-22">
                    <input type="checkbox" value="of the third quarter" class="date-filter"/>
                    of the third quarter
                </label>
            </details>
            <details open>
                <summary>Order</summary>
                <label for="order-1">
                    <input type="checkbox" value="ordered by DATO in ascending order" class="order-filter"/>
                    ordered by DATO in ascending order
                </label>
                <label for="order-2">
                    <input type="checkbox" value="ordered by DATO in descending order" class="order-filter"/>
                    ordered by DATO in descending order
                </label>
                <label for="order-3">
                    <input type="checkbox" value="arranged by DATO in ascending order" class="order-filter"/>
                    arranged by DATO in ascending order
                </label>
                <label for="order-4">
                    <input type="checkbox" value="arranged by DATO in descending order" class="order-filter"/>
                    arranged by DATO in descending order
                </label>
                <label for="order-5">
                    <input type="checkbox" value="organized by DATO in ascending order" class="order-filter"/>
                    organized by DATO in ascending order
                </label>
                <label for="order-6">
                    <input type="checkbox" value="organized by DATO in descending order" class="order-filter"/>
                    organized by DATO in descending order
                </label>
                <label for="order-7">
                    <input type="checkbox" value="sorted by DATO in ascending order" class="order-filter"/>
                    sorted by DATO in ascending order
                </label>
                <label for="order-8">
                    <input type="checkbox" value="sorted by DATO in descending order" class="order-filter"/>
                    sorted by DATO in descending order
                </label>
                <label for="order-9">
                    <input type="checkbox" value="categorized by DATO in ascending order" class="order-filter"/>
                    categorized by DATO in ascending order
                </label>
                <label for="order-10">
                    <input type="checkbox" value="categorized by DATO in descending order" class="order-filter"/>
                    categorized by DATO in descending order
                </label>
            </details>
            <details open>
                <summary>Limit</summary>
                <label for="limit-1">
                    <input type="checkbox" value="limited to NUMERO" class="limit-filter"/>
                    limited to NUMERO
                </label>
                <label for="limit-2">
                    <input type="checkbox" value="restricted to NUMERO" class="limit-filter"/>
                    restricted to NUMERO
                </label>
            </details>
        </div>
        </fieldset>
        </details>
        <button type='button' onclick="generateCombinations()">Fuse filters</button>
        <script>
                
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on the button, open the modal
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }


        var tableData = [
        ];

        function populateTable(data) {
            var table = document.getElementById("dataTable");
            var tbody = table.querySelector("tbody");

            data.forEach(function (item) {
                var row = document.createElement("tr");

                var promptCell = document.createElement("td");
                promptCell.textContent = item.prompt;
                row.appendChild(promptCell);

                var completionCell = document.createElement("td");
                completionCell.textContent = item.completion;
                row.appendChild(completionCell);

                tbody.appendChild(row);
            });
        }

        populateTable(tableData);


        var dateOptions = document.querySelectorAll(".date-filter");
        var orderOptions = document.querySelectorAll(".order-filter");
        var limitOptions = document.querySelectorAll(".limit-filter");

        var prompts = document.getElementById("prompts");

        function generateCombinations() {
            const dateFilters = Array.from(dateOptions)
                .filter(option => option.checked)
                .map(option => option.value);

            const orderFilters = Array.from(orderOptions)
                .filter(option => option.checked)
                .map(option => option.value);

            const limitFilters = Array.from(limitOptions)
                .filter(option => option.checked)
                .map(option => option.value);

            const allFilters = [...dateFilters, ...orderFilters, ...limitFilters];

            const combinations = getCombinations(allFilters);

            combinations.forEach(combo => {
                if (!hasDuplicateFilterClasses(combo)) {
                    createPrompt(combo);
                }
            });
        }

        function getCombinations(arr) {
            const result = [];
            const f = function(prefix, arr) {
                for (let i = 0; i < arr.length; i++) {
                    result.push(prefix + ' ' + arr[i]);
                    f(prefix + ' ' + arr[i], arr.slice(i + 1));
                }
            }
            f('', arr);
            return result;
        }

        function hasDuplicateFilterClasses(combination) {
            const filters = combination.split(' ');
            const uniqueFilters = new Set(filters);
            return filters.length !== uniqueFilters.size;
        }

        function createPrompt(promptText) {
            var row = document.createElement("tr");

            var inputText = document.getElementById("text").value;
            
            var promptCell = document.createElement("td");
            promptCell.textContent = inputText + ' ' + promptText;
            row.appendChild(promptCell);

            var completionCell = document.createElement("td");
            completionCell.textContent = ""; // You can add completion text here if needed
            row.appendChild(completionCell);

            prompts.appendChild(row);
        }

        generateCombinations();

        //Export table as CSV
        document.getElementById('exportButton').addEventListener('click', function() {
            // Get the table data
            var table = document.getElementById('dataTable');
            var rows = table.getElementsByTagName('tr');
            var csvData = [];

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var rowData = [];

                for (var j = 0; j < row.cells.length; j++) {
                    rowData.push(row.cells[j].textContent);
                }

                csvData.push(rowData.join(','));
            }

            // Create a CSV blob
            var csvBlob = new Blob([csvData.join('\n')], { type: 'text/csv' });

            // Create a temporary link element to trigger the download
            var link = document.createElement('a');
            link.href = URL.createObjectURL(csvBlob);
            link.download = 'CompPrompt.csv';

            // Trigger the download
            link.click();
        });
        </script>
      </section>

  <!-- PRUEBA DE COMBINACION DE ELEMENTOS EN JS 
    <form method="POST" onsubmit="processFormData(event)">
    @csrf

    <label for="request">Select Request:</label>
    <input type="checkbox" name="request[]" value="Request1"> Request 1
    <input type="checkbox" name="request[]" value="Request2"> Request 2

    <label for="complement">Select Complement:</label>
    <input type="checkbox" name="complement[]" value="Complement1"> Complement 1
    <input type="checkbox" name="complement[]" value="Complement2"> Complement 2
    <br>
    <button type="submit">Generate CSV</button>
</form>

<script>
    function processFormData(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get selected values from the form
        const selectedRequests = Array.from(document.querySelectorAll('input[name="request[]"]:checked')).map(checkbox => checkbox.value);
        const selectedComplements = Array.from(document.querySelectorAll('input[name="complement[]"]:checked')).map(checkbox => checkbox.value);

        // Combine the selected data
        const combinedData = selectedRequests.concat(selectedComplements);

        // Generate the CSV content
        const csvContent = combinedData.join(','); // Adjust this for your CSV format

        // Create a Blob object with the CSV content
        const blob = new Blob([csvContent], { type: 'text/csv' });

        // Create a temporary anchor element to download the CSV file
        const a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = 'generated_data.csv'; // Specify the filename

        // Trigger a click event on the anchor to initiate the download
        a.click();
    }
</script> -->
  </section>
</body>
</html>