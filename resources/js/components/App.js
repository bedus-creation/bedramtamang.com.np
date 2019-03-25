import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import Navbar from './Navbar';

export default class App extends Component {
    render() {
        return (
            <div className="container mx-auto">
                <div className="flex justify-center py-1">
                    <div className="text-center">
                        <img src="/img/profile.jpg" className="rounded-full h-24 w-24" />
                        <h4>Bedram Tamang</h4>
                    </div>
                </div>
                <Navbar></Navbar>
            </div>
        );
    }
}

// if (document.getElementById('app')) {
//     ReactDOM.render(<App />, document.getElementById('app'));
// }