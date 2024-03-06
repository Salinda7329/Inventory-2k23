@extends('PurchasingManager.PM-layout')

@section('title', 'View Items & Users | Inventory | SIBA Campus')

@section('content')

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">

                <div class="card">
                    <div class="card-header">
                        Users and Items
                    </div>

                    <div class="card-body">
                        <table id="items_with_users" class="data-table">
                            <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Item Name</th>
                                    <th>Current Owner</th>
                                    <th>Current Owner Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item['item_name'] }}</td>
                                        <td>{{ $item['id'] }}</td>
                                        <td>{{ $item->ownerUser->name ?? 'Unknown' }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <script>
                        $(document).ready(function() {
                            // //Make table a data table
                            $('#items_with_users').DataTable({

                                // Enable horizontal scrolling
                                // scrollX: true
                            });

                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
