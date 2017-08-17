@extends('admin.layouts.admin')

@section('contents')
  <div class="col-lg-12">
      <h1 class="page-header">All products</h1>
  </div>
  <!--End Page Header -->

  <div class="col-md-12">
                     <!--    Context Classes  -->
      <div class="panel panel-default">

      <div class="panel-heading">
      products Database
      </div>

      <div class="panel-body">
      @if(Session::has('message'))
      @include('alert.success')
      @endif
      <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>description</th>
                    <th>photo</th>
                    <th>Type</th>
                    <th>category</th>
                    <th>in Stock</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
              @if (count($products)>0)
              @foreach ($products as $product)
             
                 {{-- expr --}}
                   <tr class="">
                  <td>{{ $product->id }}</td>
                    <td>{{ str_limit($product->name,10) }}</td>
                    {{-- <td>{{ substr($product->body, 0,20)  }}</td> --}}
                    <td>{{ str_limit($product->description,10)  }}</td>
                    <td>
                     @if ($product->photos)
                  
                             @foreach ($product->photos as $photo)
                              @if ($loop->index==0)
                                 <img height="50" width="150" class="img-rounded" src="{{ $photo->thumb() }}" alt="">
                              @endif
                             

                            @endforeach
        
                    @endif
                    </td>
                    <td>@if($product->types)
                          @foreach ($product->types as $type)
                            {{ $type->name }},
                          @endforeach
                       
                    
                     @endif</td>
                    <td>
                 
                       {{-- expr --}}
                       {{ $product->category? $product->category->name:'uncategorized' }}
                     
                     </td>
                
                      <td>{{ $product->inStock }}</td>
                      <td>{{ $product->created_at->diffForHumans() }}</td>
                      <td>{{ $product->updated_at->diffForHumans() }}</td>
                    <td>
                    <a class="btn btn-info" href="{{ route('products.edit',$product->id) }}">  <i class="fa fa-edit"></i> 
                    </a>

                          <span href="" data-toggle="modal" data-target="#deleteproduct{{ $product->id }}" class="close-icon btn btn-danger" title=""><i class="fa fa-trash-o"></i></span>
             <!-- deleteproduct Modal Core -->
          <div class="modal fade" id="deleteproduct{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteproduct{{ $product->id }}Label" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                
                  <h4 class="modal-title text-center" id="deleteproduct{{ $product->id }}Label">Want to remove The product?</h4>
                <div class="modal-body">
                    <button type="button" class="btn btn-primary pull-right 3x" data-dismiss="modal" aria-hidden="true">No</button>
                  {!! Form::open(['action'=>['AdminProductsController@destroy',$product->id],'method'=>'delete','class'=>'sm-form']) !!}
                    {!! Form::button("Yes",
                     [
                     'class'=>'btn btn-danger',
                   
                     'type'=>'submit'
                     ]) !!}
                        

                  {!! Form::close() !!}
              </div>
                </div>
            
              </div>
            </div>
          </div>
       {{-- model end --}} 
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{ $products->links() }}
                                        @else
                                          <tr>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data</td>
                                            <td>no data </td>
                                            <td>no data </td>
                                            <td>no data</td>
                                        </tr>
                                       @endif
                                      
                                      



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
@endsection
