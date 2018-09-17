import React, { Component } from 'react';
import {
    ListGroup,
    ListGroupItem
} from 'reactstrap';
import 'bootstrap/dist/css/bootstrap.min.css';

export default class Index extends Component {
  render() {
    const resume_list = [];
    return (
        <div className="container">
          <h3>最新简历</h3>
          <ListGroup>
            {resume_list.length > 0 && resume_list.map((item)=>{
                return <ListGroupItem tag="a" href={"/resume/"+item.id} action>{item.title} <img src="open_in_new.png" alt=""/></ListGroupItem>
            })}
            {resume_list.length === 0 && <p>还没有简历</p>}
          </ListGroup>
        </div>
    );
  }
}