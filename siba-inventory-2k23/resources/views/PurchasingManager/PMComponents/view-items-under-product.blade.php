@extends('PurchasingManager.PM-layout')

@section('title', 'View Product Levels | Inventory | SIBA Campus')

@section('content')

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">

                <div class="card">
                    <div class="card-header">
                        Products and Levels
                    </div>
                    {{-- {{ dd($productData) }} --}}

                    <div class="card-body">
                        <table id="all_data">
                            <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Item Name</th>
                                    <th>Condition</th>
                                    <th>Availability</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->item_name }}</td>
                                        <td>{{ $item->condition }}</td>
                                        <td>{{ $item->availability }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <script>
                            $(document).ready(function() {
                                // //Make table a data table
                                $('#all_data').DataTable({

                                    // Enable horizontal scrolling
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
