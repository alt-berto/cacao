<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $data;

    public function __construct(  ) {
        //
        $this->middleware( 'auth' );
        //
        $this->data = array(  );

        /** default title */
        $this->data['title'] = '';

        /** default language */
        $this->data['language'] = 'EN';
        
        /** meta tag and information */
        $this->data['metas'] = array(  );

        /** queued css files */
        $this->data['css'] = array(
            'internals'  => array(  ),
            'externals'  => array(  )
        );
    
        /** queued css files */
        $this->data['icons'] = array(
            'internals'  => array(
            //'size' => array(  ),
            //'url' => array(  )
            ),
            'externals'  => array(
            //'size' => array(  ),
            //'url' => array(  )
            )
        );
    
        /** queued js files */
        $this->data['js'] = array(
            'internals'  => array(  ),
            'externals'  => array(  )
        );

        $this->data['costos'] = [];
        $this->data['costo'] = [];
        $this->data['unidades_productivas'] = [];
        $this->data['unidad_productiva'] = [];
        $this->data['sectores'] = [];
        $this->data['sector'] = [];
    }

    // Load Home Index View
    public function home(  ) {

        // Title
        $this->data['title'] = 'Home - Cacao Oro';

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
        // Load View
        return view( 'index' )->with( $this->data );

    }
    
}
