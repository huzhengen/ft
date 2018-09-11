import React, { Component } from 'react';
import {
  BrowserRouter as Router,
  Route,
  Link
} from 'react-router-dom';
import { Button, Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import $ from 'jquery';

export default class Index extends Component {
    constructor(props){
        super(props);
        this.state = {
            'email': '',
            'passowrd': ''
        };
    }

    handleChange(e, field){
        console.log(field)
        console.log(e.target.value)

        this.setState({
            field: e.target.value
        });
    }

    login(){
        console.log('login');
        $.post('http://localhost/?m=user&a=login_check', {
            'email': this.state.email,
            'password': this.state.password
        }, (data)=>{
            console.log(data);
        })
    }

    render() {
        return (
            <div className="container">
                <h3>登录</h3>
                <Form>
                    <FormGroup>
                        <Label for="exampleEmail">Email</Label>
                        <Input type="email" name="email" id="exampleEmail" placeholder="Email" onChange={(e)=>this.handleChange(e, 'email')} />
                    </FormGroup>
                    <FormGroup>
                        <Label for="examplePassword">Password</Label>
                        <Input type="password" name="password" id="examplePassword" placeholder="password" value={this.state.password} onChange={(e)=>this.handleChange(e, 'password')} />
                    </FormGroup>
                    <Button color="primary" onClick={this.login()}>Submit</Button>
                </Form>
            </div>
        );
    }
}