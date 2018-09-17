import React, { Component } from 'react';
import {
  BrowserRouter as Router,
  Route,
  Link
} from 'react-router-dom';
import { Button, Form, FormGroup, Label, Input, FormText } from 'reactstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import { observer, inject } from 'mobx-react';
import { Redirect } from 'react-router-dom';

@inject('store')
@observer
export default class Login extends Component {
    constructor(props){
        super(props);
        this.state = {
            'email': '',
            'password': ''
        };
    }

    login(){
        console.log(this.state);
        this.props.store.login(this.state.email, this.state.password);
        console.log('login')
    }

    handleChange(e, field){
        // this.setState({
        //     field: e.target.value
        // });

        let o = {};
        o[field] = e.target.value;
        console.log(o);
        this.setState(o);
    }

    render() {
        return (
            <div className="container">
                <h3>登录</h3>
                <Form>
                    <FormGroup>
                        <Label>Email</Label>
                        <Input type="email" name="email" placeholder="Email" onChange={(e)=>{this.handleChange(e, 'email')}} />
                    </FormGroup>
                    <FormGroup>
                        <Label>Password</Label>
                        <Input type="password" name="password" placeholder="password" onChange={(e)=>{this.handleChange(e, 'password')}} />
                    </FormGroup>
                    <Button color="primary" onClick={()=>{this.login()}}>Submit</Button>
                    {this.props.store.token != "" && <Redirect to="/myresume" />}
                </Form>
            </div>
        );
    }
}