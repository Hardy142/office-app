/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


    Dropzone.autoDiscover = false;

    
jQuery(function($){

    $(document).ready(function(){
        
        if( $( '.dropzone' )[0] ) {
            var dropzone = new Dropzone('.dropzone');
            dropzone.on("complete", function(data) {
                location.reload();
            });
        }
        
        // Message Sroll To Bottom
        if( $( '#message-board' )[0] ) {
            $( '#message-board' ).scrollTop($( '#message-board' )[0].scrollHeight);   
        }

        // Sidebar Dropdowns
        $( '.sidebar-link-with-children' ).click(function(){
            $( this ).siblings( '.sidebar-dropdown' ).slideToggle();
        });

        // Accordions
        $( '.office-accordion-header' ).click(function(e){
            $( '.office-accordion-content' ).not( $( this ).siblings( '.office-accordion-content' ) ).slideUp();
            $( '.office-accordion-header' ).not( $( this ) ).removeClass( 'office-accordion-header-text-active' );

            $( this ).siblings( '.office-accordion-content' ).slideToggle();

            if( $( this ).hasClass( 'office-accordion-header-text-active' ) ) {
                $( this ).removeClass( 'office-accordion-header-text-active' );
            }else {
                $( this ).addClass( 'office-accordion-header-text-active' );
            }
        });

        // Sidebar Collapse
        $( '.sidebar-collapse-container' ).click(function(){
            if( $( '.sidebar-container' ).hasClass( 'sidebar-container-collapsed' ) ) {
                $( '.sidebar-container' ).removeClass( 'sidebar-container-collapsed' );
                $( '.sidebar-collapse-icon-container' ).addClass( 'sidebar-collapse-icon-container-open' );
            }
            else {
                $( '.sidebar-container' ).addClass( 'sidebar-container-collapsed' );
                $( '.sidebar-collapse-icon-container' ).removeClass( 'sidebar-collapse-icon-container-open' );
                $( '.sidebar-dropdown' ).css( 'display', 'none' );
            }
        });

        // Table Links
        $( '.office-row-selectable' ).click(function(){
            window.location = '/office-tool/admin/' + $( this ).attr( 'data-type' ) + '/' + $( this ).attr( 'data-id' );
        });

        // Progress for Users Show Projects
        $( '.user-project-data' ).each(function(){
            var createdDate, dueDate, totalDaysForProject, daysLeftDiff, daysLeft, percentage, daysPassed;

            createdDate = new Date( Date.parse($( this ).attr( 'data-created-at' ) ) );
            todaysDate = new Date();
            dueDate = new Date( Date.parse( $( this ).attr( 'data-due-date' ) ) );

            totalDaysForProjectDiff = dueDate - createdDate;
            totalDaysForProject = Math.ceil( totalDaysForProjectDiff / (1000 * 3600 * 24) );

            daysLeftDiff = dueDate - todaysDate;
            daysLeft = Math.ceil( daysLeftDiff / (1000 * 3600 * 24) );

            daysPassed = totalDaysForProject - daysLeft;

            percentage = Math.round( ( daysPassed / totalDaysForProject ) * 100 );

            if( daysLeft <= 2 )
                $( this ).parents( '.user-project-progress' ).addClass( 'user-project-progress-danger' );

            if( daysLeft >= 3 && daysLeft <= 5 )
                $( this ).parents( '.user-project-progress' ).addClass( 'user-project-progress-warning' );

            if( daysLeft >= 6 )
                $( this ).parents( '.user-project-progress' ).addClass( 'user-project-progress-good' );

            if( daysLeft <= 0 ) {
                $( this ).html( 'Project Overdue' );
            }else {
                $( this ).html( daysLeft + '&nbsp;&nbsp;Days Left' );
            }

            $( this ).siblings( '.user-project-progress-fill' ).css( 'width', '' + 100 - percentage + '%' );

        });

        // Settings Avatar Hover
        $( '.settings-profile-avatar' ).hover(function(){
            $( this ).find( '.upload-overlay' ).css( 'top', '0%' );
        }, function(){
            $( this ).find( '.upload-overlay' ).css( 'top', '100%' );
        });

        // Settings Avatar Open Upload Toggle
        $( '.upload-overlay, .file-upload-toggle' ).click(function(){
            if( $( '.office-upload-container' ).hasClass( 'office-upload-container-active' ) ) {
                $( '.office-upload-container' ).removeClass( 'office-upload-container-active' );
            }else {
                $( '.office-upload-container' ).addClass( 'office-upload-container-active' );
            }
        });

    });

});
