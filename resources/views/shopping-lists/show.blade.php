@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $shopping_list->name }}

                        <br class="d-block d-sm-none">

                        <button onclick="window.print()" type="button" class="btn btn-sm btn-outline-secondary float-right ml-2 d-none d-sm-inline"> <i class="fas fa-print"></i> Print List</button>

                        <a href="{{route('shopping-lists.edit', $shopping_list->id)}}" class="btn btn-sm btn-outline-secondary float-sm-right mr-4 mr-sm-0 ml-sm-2">
                            <i class="fas fa-edit p-2 p-sm-0"></i> <span class="d-none d-sm-inline">Edit List</span></a>

                        <button @click="modalConfirmDeleteOpen = true" type="button" class="btn btn-sm btn-outline-danger float-sm-right">
                            <i class="fas fa-trash-alt p-2 p-sm-0"></i> <span class="d-none d-sm-inline">Delete List</span></button>
                    </div>

                    <div class="card-body">
                        <h4> Recipes <small><small>({{ $shopping_list->recipes->count() }})</small></small></h4>
                        <ul class="items recipe-items recipes-on-list">
                            @foreach($shopping_list->recipes as $recipe)

                                <a href="/recipes/{{$recipe->id}}"><li class="item selected-recipe-item">{{$recipe->name}}</li></a>

                            @endforeach

                        </ul>
                        <div class="clearfix"></div> <br>

                        <h4> List</h4>

                            @foreach($items->chunk(3) as $chunk)

                            <div class="row mb-2">

                                @foreach($chunk as $aisleItems)

                                    <ul class="list-group list-group-flush col-4 col-sm-4 col-xs-4">

                                        @foreach($aisleItems->sortBy('name') as $item)

                                            @if ($loop->first)

                                                <li class="list-group-item list-group-item-dark aisle-name">{{ $item->aisle->name }}
                                                    <span class="badge badge-light badge-primary badge-pill">{{ $loop->count}}</span>
                                                    <span class="print-only"><small>({{$loop->count}})</small></span>
                                                </li>

                                            @endif

                                                <li class="list-group-item recipe-view-items-section">{{ $item->name }}</li>

                                        @endforeach

                                    </ul>

                                @endforeach

                            </div>

                            @endforeach

                    </div>
                </div>
            </div>
            <modal-confirm-delete :model_type= '@json("shopping-lists")' :model_id= '@json($shopping_list->id)' v-show="modalConfirmDeleteOpen" :redirect="true"
                                  @close-confirm-delete-modal="modalConfirmDeleteOpen = false">

                <template v-slot:title> Confirm Delete </template>
                <template v-slot:body> Are you sure that you want to delete this shopping list? This action <strong>cannot be undone</strong>.  </template>

            </modal-confirm-delete>
        </div>
    </div>
@endsection
