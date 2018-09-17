import React, { Component } from 'react';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link
} from 'react-router-dom';
import './App.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import Header from './component/Header';
import Index from './component/Index';
import Login from './component/Login';
import MyResume from './component/MyResume';
import Resume from './component/Resume';

class App extends Component {
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
      <Router>
        <div className="App">
          <Header />
          <div className="main">
            <Switch>
              <Route path="/login" component={Login} />
              <Route path="/myresume" component={MyResume} />
              <Route path="/resume/:id" component={Resume} />
              <Route path="/" component={Index} />
            </Switch>
          </div>
        </div>
      </Router>
    );
  }
}

export default App;