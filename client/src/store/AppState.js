import { observable, action } from "mobx";
import axios from 'axios';

class AppState
{
    @observable token = "";
    @observable my_resume_list = [];
    @observable all_resume_list = [];
    @observable current_resume_id = 0;
    @observable current_resume_title = '';
    @observable current_resume_content = '';
    


    constructor()
    {
        if( localStorage.getItem('token') ) this.token = localStorage.getItem('token');
    }

    @action 
    async get_resume( id )
    {
        var params = new URLSearchParams();
        params.append("id" , id);
        const { data } = await axios.post( 'http://ft.tt/?m=resume&a=detail' , params );

        if( parseInt( data.code , 10 ) === 0  )
        {
            this.current_resume_id = data.data.id;
            this.current_resume_title = data.data.title;
            this.current_resume_content = data.data.content;
        }
        return data ;
    }

    async save( title , content )
    {
        var params = new URLSearchParams();
        params.append("title" , title);
        params.append("content" , content);
        params.append("token" , this.token);
        const { data } = await axios.post( 'http://ft.tt/?m=resume&a=save' , params );

        return data ;
    }

    async logout()
    {
        var params = new URLSearchParams();
        params.append("token" , this.token);
        const { data } = await axios.post( 'http://ft.tt/?m=user&a=logout' , params );

        return data ;
    }

    async remove( id )
    {
        var params = new URLSearchParams();
        params.append("id" , id);
        params.append("token" , this.token);
        const { data } = await axios.post( 'http://ft.tt/?m=resume&a=remove' , params );

        return data ;
    }

    async update( id , title , content )
    {
        var params = new URLSearchParams();
        params.append("title" , title);
        params.append("content" , content);
        params.append("id" , id);
        params.append("token" , this.token);
        const { data } = await axios.post( 'http://ft.tt/?m=resume&a=update' , params );

        return data ;
    }

    async register( email , password  )
    {
        var params = new URLSearchParams();
        params.append("email" , email);
        params.append("password" , password);
        params.append("password2" , password);
        const { data } = await axios.post( 'http://ft.tt/?m=user&a=save' , params );

        return data ;
      
    }

    @action 
    async login( email , password )
    {
        var params = new URLSearchParams();
        params.append("email" , email);
        params.append("password" , password);
        const { data } = await axios.post( 'http://ft.tt/?m=user&a=login_check' , params );

        // console.log( data );
        
        if( parseInt( data.code , 10 ) === 0 )
        {
            console.log( data.data );
            this.token = data.data.token;
            localStorage.setItem( 'token' , this.token );
        }
        
        return data;
    }
  
    @action async get_my_resume()
    {
        var params = new URLSearchParams();
        params.append("token" , this.token);
        const { data } = await axios.post( 'http://ft.tt/?m=resume&a=lists' , params );

        console.log( data );
        
        if( parseInt( data.code , 10 ) === 0 )
        {
            this.my_resume_list = data.data;
            return this.my_resume_list;
        }

        return false;
    }

    @action async get_all_resume()
    {
        var params = new URLSearchParams();
        const { data } = await axios.post( 'http://ft.tt/?m=resume&a=all_list' , params );

        // console.log( data );
        
        if( parseInt( data.code , 10 ) === 0 )
        {
            this.all_resume_list = data.data;
            return this.all_resume_list;
        }

        return false;
    }
}

export default new AppState();