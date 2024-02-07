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
                    <table id="all_product_limits_data">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Current Item Count</th>
                                <th>Damaged Item Count</th>
                                <th>View Items Under Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productData as $data)
                                <tr>
                                    <td>{{ $data['product_id'] }}</td>
                                    <td>{{ $data['product_name'] }}</td>
                                    <td>{{ $data['category'] }}</td>
                                    <td>{{ $data['current_item_count'] }}</td>
                                    <td>{{ $data['damaged_item_count'] }}</td>
                                    <td><a href="/pm/ViewItemsUnderProduct/{{ $data['product_id'] }}">View</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <script>
                        $(document).ready(function() {
                            // //Make table a data table
                            $('#all_product_limits_data').DataTable({

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
