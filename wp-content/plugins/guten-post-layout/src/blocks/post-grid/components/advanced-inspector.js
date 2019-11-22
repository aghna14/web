const { __ } = wp.i18n;

// Extend component
const { Component, Fragment } = wp.element;

// import Inspector components
const {
    TextControl,
    TabPanel,
    PanelBody,
    Dashicon
} = wp.components;



export default class AdvancedInspector extends Component{
    constructor(props){
        super(props);
    }

    render(){

        const{
            attributes:{
          
            }, attributes, setAttributes} = this.props;
        

        return(
            <Fragment>
                <div className={'gpl-pro-feature-list'}>
                    <ul>
                        <li>Zero Coding Skill Required</li>
                        <li>Most Attractive Setting Panel</li>
                        <li>15+ Layouts</li>
                        <li>Customize any option</li>
                        <li>Change any style</li>
                        <li>Custom Post Query</li>
                        <li>Custom Post Types</li>
                        <li>Select Multiple Category/Tags Option</li>
                        <li>Query Posts By Specific ID</li>
                        <li>Exclude Specific Post By ID</li>
                        <li>Toggle Meta Options</li>
                        <li>Equal Height Post Image</li>
                        <li>Custom Post Background</li>
                        <li>Adding Box Shadow</li>
                        <li>And Many More</li>
                        <li>
                            <a href="https://gutendev.com/downloads/guten-post-layout-pro/" target="_blank">Go Pro</a>
                        </li>
                    </ul>
                </div>
            </Fragment>
        );
    }

}