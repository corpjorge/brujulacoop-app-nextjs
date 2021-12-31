import React from "react";

class Alert extends React.Component {

    constructor(props) {
        super(props);
    }

    render() {
        return [
            <div className="alert alert-danger" role="alert">
                {this.props.testo}
            </div>

        ];
    }
}


export default Alert;