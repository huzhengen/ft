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
import { observer, inject } from 'mobx-react';

@inject('store')
@observer
export default class MyResume extends Component {
    componentDidMount(){
        this.props.store.get_my_resume();
    }

  render() {
    const resume_list = this.props.store.my_resume_list;
    return (
        <div className="container">
          <h3>我的简历</h3>
          <ListGroup>
            {resume_list.length > 0 && resume_list.map((item)=>{
                return <ListGroupItem tag="a" href={"/resume/"+item.id} action key={item.id}>{item.title} <img src="open_in_new.png" alt=""/></ListGroupItem>
            })}
            {resume_list.length === 0 && <p>还没有简历</p>}
          </ListGroup>
        </div>
    );
  }
}