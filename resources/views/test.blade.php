<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
</head>
<body>
    <h1>Reports</h1>

    <!--
    <form action="{{ route('reports.search') }}" method="GET">
        <label for="fullname">Full Name:</label>
        <input type="text" name="fullname" id="fullname">
        
        <label for="date">Date:</label>
        <input type="date" name="date" id="date">

        <button type="submit">Search</button>
    </form>
    -->
    <h2>All reports</h2>
    <h3>All</h3>
    @if ($reports->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reports as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>All reports from today</h3>
    @if ($reportsAT->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsAT as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>All reports from this week</h3>
    @if ($reportsAW->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsAW as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>All reports from this month</h3>
    @if ($reportsAM->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsAM as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>All reports from specific date 2023-09-19</h3>
    @if ($reportsAD->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsAD as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <br><br>



    <h2>Reports by Company</h2>
    <h3>Reports of X company for today</h3>
    @if ($reportsCT->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsCT as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Data: </strong> {{ $report->data }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>Reports of X company for this week</h3>
    @if ($reportsCW->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsCW as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Data: </strong> {{ $report->data }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>Reports of X company for this month</h3>
    @if ($reportsCM->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsCM as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Data: </strong> {{ $report->data }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>Reports of X company on specific date 2023, 3, 20</h3>
    @if ($reportsCD->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsCD as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Data: </strong> {{ $report->data }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>Reports of X company</h3>
    @if ($reportsC->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsC as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Data: </strong> {{ $report->data }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br><br>



    <h2>Reports by title (SA)</h2>
    <h3>Reports with x title for today</h3>
    @if ($reportsTT->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsTT as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Data: </strong> {{ $report->data }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>Reports with x title for this month</h3>
    @if ($reportsTM->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsTM as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Data: </strong> {{ $report->data }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>Reports with x title for date 2023-03-20 (o)</h3>
    @if ($reportsTD->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsTD as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Data: </strong> {{ $report->data }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br>
    <h3>All Reports with x title</h3>
    @if ($reportsT->isEmpty())
        <p>Pues no lmao</p>
    @else
        <ul>
            @foreach ($reportsT as $report)
                <li>
                    <strong>Title: </strong> {{ $report->title }}<br>
                    <strong>Data: </strong> {{ $report->data }}<br>
                    <strong>Company: </strong> {{ $report->company->name }}<br>
                    <strong>Creation: </strong> {{ $report->created_at }}
                </li>
                <br>
            @endforeach
        </ul>
    @endif
    <br><br>
</body>
</html>