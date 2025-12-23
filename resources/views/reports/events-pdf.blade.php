<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Arial', sans-serif;
            padding: 30px;
            color: #333;
        }
        
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px solid #9333EA;
            padding-bottom: 15px;
        }
        
        .header h1 {
            color: #9333EA;
            font-size: 24px;
            margin-bottom: 8px;
        }
        
        .header p {
            color: #666;
            font-size: 12px;
        }
        
        .meta-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding: 12px;
            background-color: #F3F4F6;
            border-radius: 5px;
        }
        
        .meta-info div {
            font-size: 12px;
        }
        
        .meta-info strong {
            color: #9333EA;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 9px;
        }
        
        thead {
            background-color: #9333EA;
            color: white;
        }
        
        th {
            padding: 8px 6px;
            text-align: left;
            font-size: 9px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        td {
            padding: 7px 6px;
            border-bottom: 1px solid #E5E7EB;
            font-size: 8px;
        }
        
        tbody tr:hover {
            background-color: #F9FAFB;
        }
        
        tbody tr:nth-child(even) {
            background-color: #F3F4F6;
        }
        
        .badge {
            padding: 3px 6px;
            border-radius: 3px;
            font-size: 7px;
            font-weight: 600;
            text-transform: capitalize;
        }
        
        .badge-scheduled {
            background-color: #DBEAFE;
            color: #1E40AF;
        }
        
        .badge-ongoing {
            background-color: #D1FAE5;
            color: #065F46;
        }
        
        .badge-completed {
            background-color: #E9D5FF;
            color: #6B21A8;
        }
        
        .badge-cancelled {
            background-color: #FEE2E2;
            color: #991B1B;
        }
        
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 8px;
            color: #999;
            border-top: 1px solid #E5E7EB;
            padding-top: 15px;
        }
        
        .no-data {
            text-align: center;
            padding: 30px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Comprehensive Report of All Events</p>
    </div>
    
    <div class="meta-info">
        <div>
            <strong>Report Date:</strong> {{ $date }}
        </div>
        <div>
            <strong>Total Events:</strong> {{ $total_events }}
        </div>
    </div>
    
    @if($events->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Creator</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Location</th>
                    <th>Price (Rp)</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $index => $event)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td><strong>{{ $event->title }}</strong></td>
                    <td>{{ $event->category->name ?? '-' }}</td>
                    <td>{{ $event->creator->name ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->start_date_time)->format('d M Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->end_date_time)->format('d M Y H:i') }}</td>
                    <td>{{ $event->location }}</td>
                    <td>{{ number_format($event->price, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge badge-{{ $event->status }}">
                            {{ ucfirst($event->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            No events found in the database.
        </div>
    @endif
    
    <div class="footer">
        <p>Generated on {{ now()->format('d F Y H:i:s') }} | Acarra Event Management System</p>
        <p>This is a computer-generated document. No signature is required.</p>
    </div>
</body>
</html>
