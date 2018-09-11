import React, { Component } from 'react';
import {
  BrowserRouter as Router,
  Route,
  Link
} from 'react-router-dom';
import {
    ListGroup,
    ListGroupItem
} from 'reactstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

export default class Index extends Component {

  render() {
    return (
        <div className="container">
          <h3>最新简历</h3>
          <ListGroup>
            <ListGroupItem tag="a" href="#" action>Cras justo odio <img src="open_in_new.png" alt=""/></ListGroupItem>
            <ListGroupItem tag="a" href="#" action>Dapibus ac facilisis in</ListGroupItem>
            <ListGroupItem tag="a" href="#">Morbi leo risus</ListGroupItem>
            <ListGroupItem tag="a" href="#">Porta ac consectetur ac</ListGroupItem>
            <ListGroupItem tag="a" href="#">Vestibulum at eros</ListGroupItem>
          </ListGroup>
        </div>
    );
  }
}