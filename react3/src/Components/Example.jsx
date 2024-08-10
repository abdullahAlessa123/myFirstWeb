import  { Component } from 'react'

import CV from 'react-cv'


class Example extends Component {
  render () {
    return (
      <CV
        personalData={{
          name: 'Abdullah Ali Alessa',
          title: 'Web developer',
          image: '/photo_2024-08-11_01-19-35.jpg',
          contacts: [
            { type: 'email', value: 'aaa.com2003@gmail.com' },
            { type: 'phone', value: '0540753669' },
            { type: 'location', value: 'Riyadh' },
            { type: 'website', value: 'abdullahalialessa/cv.com' },
        ]}}
        sections= {[{
          type: 'text',
          title: 'Career Profile',
          content: `As a Computer Science student , I never felt so passionate like I felt when I started developing my first website , So let me tell about my strengths . `,
          icon: 'usertie',
        } ,

        {
            type: 'text',
            title: 'Education',
            content: `I am a Computer Science student in my final year , With a 4.78 GPA . You can see it <a href="https://example.com" target="_blank" rel="noopener noreferrer">here</a> `,
            icon: 'graduation',
          } ,

          {
            type: 'text',
            title: 'Skills',
            content: `PHP Laravel , React , HTML , CSS , javascript , MySql , Java , C , Python , First Aid , Audacity , Word , Excel , PowerPoint , Camtasia  `,
            icon: 'rocket',
          } ,

          {
            type: 'text',
            title: 'Certificates',
            content: `Click <a href="http://abdullahalialessa/certificates" target="_blank" rel="noopener noreferrer">here</a>`,
            icon: 'archive',
          } ,

          {
            type: 'text',
            title: 'Languages',
            content: `I got a 55 in the PTE English exam which is equivalent to 6 in IELTS`,
            icon: 'language',
          } ,
    
    ]}
        branding={false} // or false to hide it.
      />
    )
  }
}

export default Example;