import React, { Component } from 'react';
import {
    Collapse,
    Navbar,
    NavbarToggler,
    NavbarBrand,
    Nav,
    NavItem,
    NavLink,
} from 'reactstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

export default class Header extends Component {
    constructor(props) {
      super(props);
  
      this.toggle = this.toggle.bind(this);
      this.state = {
        isOpen: false
      };
    }
    toggle() {
      this.setState({
        isOpen: !this.state.isOpen
      });
    }
  
    render() {
      return (
        <div className="header">
            <Navbar color="light" light expand="md">
            <NavbarBrand href="/">Resume</NavbarBrand>
            <NavbarToggler onClick={this.toggle} />
            <Collapse isOpen={this.state.isOpen} navbar>
                <Nav className="ml-auto" navbar>
                <NavItem><NavLink href="/components">我的简历</NavLink></NavItem>
                <NavItem><NavLink href="/logout">退出</NavLink></NavItem>
                <NavItem><NavLink href="/reg">注册</NavLink></NavItem>
                <NavItem><NavLink href="/login">登录</NavLink></NavItem>
                </Nav>
            </Collapse>
            </Navbar>
        </div>
      );
    }
}