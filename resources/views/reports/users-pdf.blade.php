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
            padding: 40px;
            color: #333;
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 3px solid #4F46E5;
            padding-bottom: 20px;
        }
        
        .header h1 {
            color: #4F46E5;
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .header p {
            color: #666;
            font-size: 14px;
        }
        
        .meta-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #F3F4F6;
            border-radius: 5px;
        }
        
        .meta-info div {
            font-size: 14px;
        }
        
        .meta-info strong {
            color: #4F46E5;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        thead {
            background-color: #4F46E5;
            color: white;
        }
        
        th {
            padding: 12px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #E5E7EB;
            font-size: 11px;
        }
        
        tbody tr:hover {
            background-color: #F9FAFB;
        }
        
        tbody tr:nth-child(even) {
            background-color: #F3F4F6;
        }
        
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: 600;
            text-transform: capitalize;
        }
        
        .badge-admin {
            background-color: #DBEAFE;
            color: #1E40AF;
        }
        
        .badge-user {
            background-color: #D1FAE5;
            color: #065F46;
        }
        
        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 10px;
            color: #999;
            border-top: 1px solid #E5E7EB;
            padding-top: 20px;
        }
        
        .no-data {
            text-align: center;
            padding: 40px;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
        <p>Comprehensive Report of All Registered Users</p>
    </div>
    
    <div class="meta-info">
        <div>
            <strong>Report Date:</strong> {{ $date }}
        </div>
        <div>
            <strong>Total Users:</strong> {{ $total_users }}
        </div>
    </div>
    
    @if($users->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Birthdate</th>
                    <th>Role</th>
                    <th>Registered At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone ?? '-' }}</td>
                    <td>{{ $user->birthdate ? \Carbon\Carbon::parse($user->birthdate)->format('d M Y') : '-' }}</td>
                    <td>
                        <span class="badge badge-{{ $user->role }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="no-data">
            No users found in the database.
        </div>
    @endif
    
    <div class="footer">
        <p>Generated on {{ now()->format('d F Y H:i:s') }} | Acarra Event Management System</p>
        <p>This is a computer-generated document. No signature is required.</p>
    </div>
</body>
</html>
