import { observable, computed, action } from 'mobx';
import $ from 'jquery';


class AppState{
    @observable token= '';
    @observable my_resume_list = [];
    @observable all_resume_list = [];
    @observable current_resume_id = 0;
    @observable current_resume_title = '';
    @observable current_resume_content = '';

    constructor(){
        if(localStorage.getItem('token')) this.token = localStorage.getItem('token');
    }

    @action async get_resume(id){
        $.post('http://ft.tt/?m=resume&a=detail', {
            'id': id
        }, (data)=>{
            console.log(data);
            if(parseInt(data.code, 10) == 0){
                this.current_resume_id = data.data.id;
                this.current_resume_title = data.data.title;
                this.current_resume_content = data.data.content;
            }
        }, 'json'); 
    }

    @action
    async register(email, password, password2){
        $.post('http://ft.tt/?m=user&a=save', {
            'email': email,
            'password': password,
            'password2': password2
        }, (data)=>{
            console.log(data);
            // if(data.code && data.code == 0){
            //     this.token = data.data.token;
            // }
            if(parseInt(data.code, 10) == 0){
                return true;
            }else{
                return false;
            }
        }, 'json');
    }

    @action
    async login(email, password){
        $.post('http://ft.tt/?m=user&a=login_check', {
            'email': email,
            'password': password
        }, (data)=>{
            console.log(data);
            // if(data.code && data.code == 0){
            //     this.token = data.data.token;
            // }
            if(parseInt(data.code, 10) == 0){
                this.token = data.data.token;
                localStorage.setItem('token', this.token);
            }
        }, 'json');
    }

    @action async get_my_resume(){    
        $.post('http://ft.tt/?m=resume&a=lists', {
            'token': this.token,
        }, (data)=>{
            console.log(data);
            // if(data.code && data.code == 0){
            //     this.token = data.data.token;
            // }
            if(parseInt(data.code, 10) == 0){
                this.my_resume_list = data.data;
            }
        }, 'json'); 
    }
}

export default new AppState;