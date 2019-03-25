import React, { Component } from 'react';

export default class Navbar extends Component {
    render() {
        return (
            <div className="flex md:justify-center bg-grey-lighter font-semibold whitespace-no-wrap overflow-auto">
                <div className="px-3 py-3">Home</div>
                <div className="px-3 py-3">Blog</div>
                <div className="px-3 py-3">Portfolio</div>
                <div className="px-3 py-3">Project</div>
                <div className="px-3 py-3">Who I am ?</div>
            </div>
        )
    }
}