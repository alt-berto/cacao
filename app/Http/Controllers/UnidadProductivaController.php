<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\UnidadProductiva;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnidadProductivaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(  )
    {
        //
        $user = Auth::user(  ); 
        if ( $user->is_admin ) {
            //
            $this->data['unidades_productivas'] = UnidadProductiva::where( 'isdeleted', false )->get(  );
            // Title
            $this->data['title'] = 'Lista de Unidades Productivas - Cacao Oro';

            // Load Metas
            $this->data['metas'][] = [ 'name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no' ];
            $this->data['metas'][] = [ 'name' => 'generator', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'author', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'Description', 'content' => ''];
            //$this->data['metas'][] = [ 'name' => 'csrf-token', 'content' => '{{ csrf_token() }}' ];

            // Load External CSS Files
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Montserrat:400,700';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin';

            // Load Internals CSS Files.
            $this->data['css']['internals'][] = 'bootstrap.min.css';
            $this->data['css']['internals'][] = 'app.css';
            $this->data['css']['internals'][] = 'style.css';

            // Load Internal Icons Files.
            $this->data['icons']['internals'][] = [ 'rel' => 'icon', 'size' => '', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '310x310', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '150x150', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '144x144', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '96x96', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '70x70', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '32x32', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '16x16', 'url' => 'logo-128x128-1.png' ];

            // Load Externals JS Files.

            // Load Internal JS Files.
            $this->data['js']['internals'][] = 'jquery-3.2.1.slim.min.js';
            $this->data['js']['internals'][] = 'popper.min.js';
            $this->data['js']['internals'][] = 'bootstrap.min.js';
            $this->data['js']['internals'][] = 'app.js';
            //
            return view( 'list_unidades_productivas' )->with( $this->data );
        }
        return abort( 404 );
    }

    public function active( Request $request ) {
        //
        $unidades_productivas = UnidadProductiva::where( 'isdeleted', false )->with( 'sectores' )->orderBy('name', 'asc')->get(  );
        
        if ( $request->wantsJson(  ) ) {
            return $unidades_productivas->toJson(  );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(  )
    {
        //
        $user = Auth::user(  ); 
        if ( $user->is_admin ) {

            // Title
            $this->data['title'] = 'Crear Unidad Productiva - Cacao Oro';

            // Load Metas
            $this->data['metas'][] = [ 'name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no' ];
            $this->data['metas'][] = [ 'name' => 'generator', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'author', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'Description', 'content' => ''];
            //$this->data['metas'][] = [ 'name' => 'csrf-token', 'content' => '{{ csrf_token() }}' ];

            // Load External CSS Files
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Montserrat:400,700';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin';

            // Load Internals CSS Files.
            $this->data['css']['internals'][] = 'bootstrap.min.css';
            $this->data['css']['internals'][] = 'app.css';
            $this->data['css']['internals'][] = 'style.css';

            // Load Internal Icons Files.
            $this->data['icons']['internals'][] = [ 'rel' => 'icon', 'size' => '', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '310x310', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '150x150', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '144x144', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '96x96', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '70x70', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '32x32', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '16x16', 'url' => 'logo-128x128-1.png' ];

            // Load Externals JS Files.

            // Load Internal JS Files.
            $this->data['js']['internals'][] = 'jquery-3.2.1.slim.min.js';
            $this->data['js']['internals'][] = 'popper.min.js';
            $this->data['js']['internals'][] = 'bootstrap.min.js';
            $this->data['js']['internals'][] = 'app.js';
            //
            return view( 'create_unidad_productiva' )->with( $this->data );
        }
        return abort( 404 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        //
        $this->validate( request(  ), [ 
            'name' => 'required|max:255',
            'address' => 'max:255',
            'size' => $request->size,
            'lat' => 'max:255',
            'long' => 'max:255',
            'note' => 'max:255',
        ] );
        //
        $current_timestamp = date('Y-m-d H:i:s');
        $in_unidad_productiva = UnidadProductiva::create( [ 
            'name' => $request->name,
            'address' => $request->address,
            'size' => $request->size,
            'lat' => $request->lat,
            'long' => $request->long,
            'note' => $request->note, 
            'isactive' => $request->isactive,
            'created_at' => $current_timestamp
          ] );        
       
                      
        return redirect(  )->back(  )->with( 'success', 'Unidad Productiva agregada correctamente!.' ); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnidadProductiva  $unidadProductiva
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request, $id )
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnidadProductiva  $unidadProductiva
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, $id )
    {
        //
        $user = Auth::user(  ); 
        if ( $user->is_admin ) {
            //
            $this->data['unidad_productiva'] = UnidadProductiva::where( 'id', $id )->first(  );

            // Title
            $this->data['title'] = 'Editar Unidad Productiva - Cacao Oro';

            // Load Metas
            $this->data['metas'][] = [ 'name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no' ];
            $this->data['metas'][] = [ 'name' => 'generator', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'author', 'content' => 'albert' ];
            $this->data['metas'][] = [ 'name' => 'Description', 'content' => ''];
            //$this->data['metas'][] = [ 'name' => 'csrf-token', 'content' => '{{ csrf_token() }}' ];

            // Load External CSS Files
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Montserrat:400,700';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
            $this->data['css']['externals'][] = 'https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&subset=latin';

            // Load Internals CSS Files.
            $this->data['css']['internals'][] = 'bootstrap.min.css';
            $this->data['css']['internals'][] = 'app.css';
            $this->data['css']['internals'][] = 'style.css';

            // Load Internal Icons Files.
            $this->data['icons']['internals'][] = [ 'rel' => 'icon', 'size' => '', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '310x310', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '150x150', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '144x144', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '96x96', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '70x70', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '32x32', 'url' => 'logo-128x128-1.png' ];
            $this->data['icons']['internals'][] = [ 'rel' => 'apple-touch-icon', 'size' => '16x16', 'url' => 'logo-128x128-1.png' ];

            // Load Externals JS Files.

            // Load Internal JS Files.
            $this->data['js']['internals'][] = 'jquery-3.2.1.slim.min.js';
            $this->data['js']['internals'][] = 'popper.min.js';
            $this->data['js']['internals'][] = 'bootstrap.min.js';
            $this->data['js']['internals'][] = 'app.js';
            //
            return view( 'edit_unidad_productiva' )->with( $this->data );
        }
        return abort( 404 );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnidadProductiva  $unidadProductiva
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id )
    {
        //
        $this->validate( request(  ), [ 
            'name' => 'required|max:255',
            'address' => 'max:255',
            'lat' => 'max:255',
            'long' => 'max:255',
            'note' => 'max:255',
        ] );
        //
        $current_timestamp = date('Y-m-d H:i:s');
        $in_unidad_productiva = UnidadProductiva::where( 'id', $id )->update( [
            'name' => $request->name,
            'address' => $request->address,
            'lat' => $request->lat,
            'long' => $request->long,
            'note' => $request->note,
            'isactive' => $request->isactive,
            'updated_at' => $current_timestamp
        ] );            
        //
        return redirect(  )->back(  )->with( 'success', 'Se ha modificado la unidad productiva correctamente' ); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnidadProductiva  $unidadProductiva
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id )
    {
        //
        $in_unidad_productiva = UnidadProductiva::find( $id );
        $name = $in_unidad_productiva->name;
        $in_unidad_productiva->update( [ 'isdeleted' => true ] );
        return redirect(  )->back(  )->with( 'success', 'Se ha eliminado correctamente la unidad productiva: '.$name ); 
    }
}
